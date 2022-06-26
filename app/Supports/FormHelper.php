<?php

if (!function_exists('isInvalidInput')) {

    /**
     * Get 'is-invalid' if there is an error with the key.
     * 
     * @param string $key
     * 
     * @return string
     */
    function isInvalidInput($key)
    {
        $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;

        return $errors->has($key) ? 'is-invalid' : null;
    }
}

if (!function_exists('getParamValue')) {

    /**
     * Get param from filters
     * @param string $param
     * @return string
     */
    function getParamValue(array $params, string $key)
    {
        return isset($params[$key]) ? $params[$key] : null;
    }
}

if (!function_exists('isSelectedOption')) {

    /**
     * Get param from filters
     * @param string $param
     * @param string $key
     * @param string $value
     * 
     * @return string
     */
    function isSelectedOption(array $params, string $key, string $value)
    {
        return isset($params[$key]) && $params[$key] == $value ? 'selected' : null;
    }
}

if (!function_exists('isSelectedOld')) {

    /**
     * Get param from filters
     * @param string $key
     * @param string $value
     * 
     * @return string
     */
    function isSelectedOld($key, string $value)
    {
        return $key == $value ? 'selected' : null;
    }
}
