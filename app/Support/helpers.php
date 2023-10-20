<?php

use Illuminate\Support\Str;

const DEFAULT_URL = 'http://url-shortener.test/';

if (!function_exists('generateRandomString')) {
    /**
     * Return amount without cents.
     *
     * @param  string  $amount
     * @return string
     */
    function generateRandomString()
    {
        return Str::random(5);
    }
}
