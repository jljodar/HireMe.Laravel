<?php

use Carbon\Carbon;

if (! function_exists('diffForHumansOnlyDays')) {
    function diffForHumansOnlyDays($timestamp) {
        $date = Carbon::createFromTimeStamp(strtotime($timestamp));

        if($date->isToday()) {
            return 'Today';
        } else if($date->isYesterday()) {
            return 'Yesterday';
        } else {
            return $date->diffForHumans();
        }
    }
}
