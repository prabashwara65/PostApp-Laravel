<?php

if (!function_exists('format_date')) {
    function format_date($date)
    {
        return \Carbon\Carbon::parse($date)->format('F d, Y');
    }
}
