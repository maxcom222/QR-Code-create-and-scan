<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Helpers\Messages;
use App\Rules\PhoneNumber;
use App\User;
use App\Lookup;
use App\Campaign;
use App\Campaignhit;
use Illuminate\Support\Facades\Auth;
use LaravelQRCode\Facades\QRCode;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $query = DB::table('campaignhits')
                 ->selectRaw('campaignhits.*,campaigns.qrcode')
                 ->join('campaigns','campaigns.id', 'campaignhits.campaignid')
                    ->where("campaigns.user_id", Auth::user()->id);

        $rs = $query->get();
        $pageconfig = [
            'title' => 'Dashboard',
            'rs' => $rs
        ];
        $campaigns = Campaign::query()->where("campaigns.user_id", Auth::user()->id)->orderBy("id")->pluck('qrcode');
        $query = DB::select(DB::raw("
            SELECT b.count FROM campaigns AS a
            LEFT JOIN (
                SELECT campaignid, COUNT(campaignid) AS count FROM campaignhits GROUP BY campaignid
                ) AS b ON a.id = b.campaignid
            WHERE a.user_id = " . Auth::user()->id . " ORDER BY a.id
        "));
        $values = array();
        foreach ($query as $one)
        {
            array_push($values, $one->count);
        }

        return view('home',['pageconfig' => $pageconfig, 'campaigns'=>$campaigns, 'values'=>json_encode($values)]);
    }
    public function admin_dashboard()
    {
        $pageconfig = [
            'title' => 'Dashboard'
        ];
        $query = DB::select(DB::raw("SELECT COUNT(*) count, DATE(created_at) dt FROM campaigns GROUP BY DATE(created_at) ORDER BY DATE(created_at);"));
        $compaigns_values = array();
        foreach ($query as $one)
        {
            array_push($compaigns_values, $one->count);
        }
        $query = DB::select(DB::raw("SELECT COUNT(*) count, DATE(created_at) dt FROM campaignhits GROUP BY DATE(created_at) ORDER BY DATE(created_at);"));
        $compaignhits_values = array();
        foreach ($query as $one)
        {
            array_push($compaignhits_values, $one->count);
        }
        $compaigns_count = sizeof(Campaign::all()->toArray());
        $compaignhits_count = sizeof(Campaignhit::all()->toArray());

        $campaigns = Campaign::query()->orderBy("id")->pluck('qrcode');
        $query = DB::select(DB::raw("
            SELECT b.count FROM campaigns AS a
            LEFT JOIN (
                SELECT campaignid, COUNT(campaignid) AS count FROM campaignhits GROUP BY campaignid
                ) AS b ON a.id = b.campaignid ORDER BY a.id
        "));
        $scanned_values = array();
        foreach ($query as $one)
        {
            if (!isset($one->count))
                array_push($scanned_values, 0);
            else
                array_push($scanned_values, $one->count);
        }
        $users = User::query()->where('email', '<>', 'kewrunner@gmail.com')->get();

        $qrcodes = Campaign::query()->orderBy("id")->get();
        return view('admin_dashboard',['pageconfig' => $pageconfig, 'compaigns_count' => $compaigns_count, 'compaignhits_count'=>$compaignhits_count
            , 'compaigns_values'=>json_encode($compaigns_values), 'compaignhits_values'=>json_encode($compaignhits_values)
            , 'campaigns' => $campaigns, 'scanned_values' => json_encode($scanned_values)
            , 'users'=>$users, 'qrcodes'=>$qrcodes]);
    }
    public function getCcoordinates(Request $request){
        $type = $request->type;
        $dt_start = "";
        $dt_end = "";
        $today = date("Y-m-d");
        if ($type == "today")
        {
            $dt_start = $today;
            $dt_end = $today;
        } else if ($type == "week")
        {
            $day = date('w');
            $dt_start = date('Y-m-d', strtotime('-'.$day.' days'));
            $dt_end = $today;
        } else if ($type == "month")
        {
            $day = date('d') - 1;
            $dt_start = date('Y-m-d', strtotime('-'.$day.' days'));
            $dt_end = $today;
        } else if ($type == "all")
        {
            $dt_start = "2000-01-01";
            $dt_end = $today;
        }
        $query = DB::select(DB::raw("
            SELECT a.gpslat, a.gpslng, b.qrcode, a.location FROM campaignhits AS a
            JOIN campaigns AS b ON a.campaignid = b.id
            WHERE a.campaignid IN (SELECT id FROM campaigns WHERE user_id = " . Auth::user()->id . ")
                AND DATE(a.created_at) >= DATE('" . $dt_start . "') AND DATE(a.created_at) <= DATE('" . $dt_end . "')"));
        return json_encode($query);
    }

    public function campaign(Request $request)
    {
        $campaign = null;
        if(Helpers::fp())
        {
            $campaign = Campaign::create([
                'user_id' => \Auth::user()->id,
                'qrcode' => $request->input('qrcode'),
                'url' => $request->input('url')
            ]);
        }

        $pageconfig = [
            'title' => 'Campaign',
            'campaign' => $campaign
        ];

        return view('campaign',['pageconfig' => $pageconfig]);
    }

    public function setlockuser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->islocked = $request->state;
        $user->save();
        return "OK";
    }

    public function deleteuser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        return "OK";
    }

    public function deletecode(Request $request)
    {
        $user = Campaign::find($request->qrcode_id);
        $user->delete();
        return "OK";
    }

    public function reviewcode(Request $request)
    {
        $user = Campaign::find($request->qrcode_id);
        return $user;
    }

    public function locked_user(){
        $query = DB::table('campaignhits')
            ->selectRaw('campaignhits.*,campaigns.qrcode')
            ->join('campaigns','campaigns.id', 'campaignhits.campaignid')
            ->where("campaigns.user_id", Auth::user()->id);

        $rs = $query->get();
        $pageconfig = [
            'title' => 'Dashboard',
            'rs' => $rs
        ];
        return view("locked", ["pageconfig"=>$pageconfig]);
    }

    public function viewcampaigns(Request $request)
    {
        if($request->segment(2) == 'view')
        {
            $id = decrypt($request->segment(3));

            $campaign = Campaign::find($id);

            $pageconfig = [
                'title' => 'Campaign',
                'campaign' => $campaign
            ];

            return view('campaign',['pageconfig' => $pageconfig]);

        }
        else if($request->segment(2) == 'delete')
        {
            $id = decrypt($request->segment(3));
            $id = decrypt($request->segment(3));
            Campaign::where('id', $id)
                ->delete();
            Messages::success('Campaign deleted!');
            return redirect('/' . $request->segment(1));
        }

        $campaign = null;
        $pageconfig = [
            'title' => 'View Campaigns',
            'rs' => Campaign::query()->where("user_id", \Auth::user()->id)->get()
        ];

        return view('viewcampaigns',['pageconfig' => $pageconfig]);
    }
}
