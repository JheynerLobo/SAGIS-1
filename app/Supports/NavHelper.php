<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('isActiveRoute')) {
    /**
     * @param string $route
     * @param string $value
     * 
     * @return string
     */
    function isActiveRoute($route, $value)
    {
        return Route::is($route) ? $value : null;
    }
}
