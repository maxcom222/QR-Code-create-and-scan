<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Helpers\Messages;
use App\Rules\PhoneNumber;
use App\User;
use App\Campaignhit;
use App\Campaign;
use LaravelQRCode\Facades\QRCode;


class WebController extends Controller
{

    public function index()
    {
    }

    public function track(Request $request)
    {
        $id = $request->segment(2);
        $pageconfig =  ['id' => $id];

        $key = '1a16715ccd10b1c6e5e4d5636890f51d';
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'http://api.ipstack.com/' . $ip . '?access_key=' . $key;
        $json = Helpers::url_get_contents($url);
        $location = json_decode($json);
        $locationstr = $location->continent_name . '/' . $location->city . '/' . $location->zip;

        $campaignhit = Campaignhit::create(
            ['campaignid' => $id,
            'gpslat' => $location->latitude,
            'gpslng' => $location->longitude,
            'location' => $locationstr,
            'browser' => $_SERVER['HTTP_USER_AGENT']]
        );

        $campaign = Campaign::find($id);
        // echo $campaign->url;
        // exit;

        return redirect($campaign->url);

        //return view('trackclick',['pageconfig' => $pageconfig]);
    }

    public function privacypolicy()
    {
        return view('privacypolicy');
    }

    public function termsandconditions()
    {
        return view('termsandconditions');
    }

    public function qrcode(Request $request)
    {
        $url = url('/track/' . $request->segment(2));
        return QRCode::text($url)->png();
    }
}
