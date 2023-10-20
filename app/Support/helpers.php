<?php

use Illuminate\Support\Str;
use Carbon\Carbon;

const DEFAULT_URL = 'http://url-shortener.test/';

if (!function_exists('generateRandomString')) {
    function generateRandomString()
    {
        return Str::random(5);
    }
}

if (!function_exists('getThresholdDate')) {
    function getThresholdDate()
    {
        return Carbon::now()->subDays(30);
    }
}
