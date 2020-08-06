<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Helpers\Messages;
use App\Rules\PhoneNumber;
use App\User;
use LaravelQRCode\Facades\QRCode;


class TestController extends Controller
{
    
    public function index()
    {      
        
        $key = '1a16715ccd10b1c6e5e4d5636890f51d';
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'http://api.ipstack.com/' . $ip . '?access_key=' . $key;
        
        $json = Helpers::url_get_contents($url);
        
        $location = json_decode($json);
            
        $str = $location->continent_name . '/' . $location->city . '/' . $location->zip;
        echo $str;


        
    }

   
}
