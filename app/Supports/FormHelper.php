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
