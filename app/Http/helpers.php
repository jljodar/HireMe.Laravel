<?php

use Carbon\Carbon;

if (! function_exists('diffForHumans')) {
    function diffForHumans($timestamp) {
        return Carbon::createFromTimeStamp(strtotime($timestamp))->diffForHumans();
    }
}
