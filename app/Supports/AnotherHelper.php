<?php

use Illuminate\Support\Carbon;

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
