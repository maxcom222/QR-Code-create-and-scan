<?php
namespace App\Helpers;
use App\Lookup;
use App\User;
use App\Account;

class Helpers
{   
    public static function fp()
    {
        if (isset($_POST['fp']))
            return true;
        else
            return false;
    }
    
    public static function get($fieldname, $default = '')
    {
        if (isset($_POST[$fieldname]))
            return $_POST[$fieldname];
        else
            return $default;
    }
    
    public static function get_lookup_options($lookuptype, $default = null)
    {
        $html = '';

        $lookups = Lookup::where('lookuptype', $lookuptype)->get();

        foreach ($lookups as $row) {
            if (($default != '') && ($default == $row->id))
                $html .= '<option value="' . $row->id . '" selected="selected">' . $row->lookupvalue . '</option>';
            else
                $html .= '<option value="' . $row->id . '">' . $row->lookupvalue . '</option>';
        }
        echo $html;
    }

    public static function get_lookup_value($lookupid)
    {
        $val = Lookup::where('id', $lookupid)->get();
        if (count($val) > 0)
            return $val[0]->lookupvalue;
        else
            return '';
    }

    public static function showdate($value)
    {
        if (empty($value))
            return '';
        else
            return date('Y-m-d', strtotime($value));
    }

    public static function showtime($value)
    {
        if (empty($value))
            return '';
        else
            return date('H:i:s', strtotime($value));
    }

    public static function showdatetime($value)
    {
        if (empty($value))
            return '';
        else
            return date('Y-m-d H:i:s', strtotime($value));
    }

    public static function mysqltime()
    {
        return date('Y-m-d H:i:s');
    }

    public static function url_get_contents($Url)
    {
        if (!function_exists('curl_init')) {
            die('CURL is not installed!');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public static function nullie($value)
    {
        if ($value == '')
            return null;
        else
            return $value;
    }

    public static function guid()
    {
        mt_srand((double)microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return strtolower($uuid);
    }
    
    public static function time_lapsed ($time)
    {

        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
}
