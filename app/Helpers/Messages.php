<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use DB;
use App\Lookup;

class Messages
{
    public static function success($msg)
    {
        session(['success_msg' => $msg]);
    }

    public static function error($msg)
    {
        session(['error_msg' => $msg]);
    }

    public static function display()
    {
    	if(session()->has('success_msg')) {
			$value = session('success_msg');
			session()->forget('success_msg');

            return '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>     
                        <strong>Success</strong> ' . $value .
                    '</div>';            
		}
		if(session()->has('error_msg')) {
			$value = session('error_msg');
			session()->forget('error_msg');
            return '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error</strong> ' . $value .
                    '</div>';            
		}
    }
}