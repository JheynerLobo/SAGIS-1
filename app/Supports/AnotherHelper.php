<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('generateRandomPostAssets')) {

    /**
     * @param int $min
     * @param int $max
     * 
     * @return int
     */
    function generateRandomPostAssets($min, $max)
    {
        if ($min < 0) {
            $min = 0;
        }
        if ($min > $max) {
            $aux = $min;
            $max = $min;
            $min = $aux;
        }

        return rand($min, $max);
    }
}

if (!function_exists('set_sub_month_date_filter')) {
    /**
     * @param array $array
     * @param string $key
     * @param int $subMonth
     * @return array
     */
    function set_sub_month_date_filter($array, $key, $subMonth = 0)
    {

        if (!isset($array[$key])) {
            $array[$key] = Carbon::now()->subMonth($subMonth)->toDateString();
        }

        return $array;
    }
}

if (!function_exists('transformBoolToText')) {
    /**
     * @param array $array
     * @param string $key
     * @param int $subMonth
     * @return array
     */
    function transformBoolToText(bool $bool, string $text, string $text2)
    {

        return $bool ? $text : $text2;
    }
}


if (!function_exists('getFormatoNumber')) {
function getFormatoNumber($number){
    return  number_format($number);
}

}

if (!function_exists('graduate_user')) {
    function graduate_user(){
        return  Auth::guard('web')->user();
    }
    
    }





