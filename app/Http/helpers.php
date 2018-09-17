<?php

if (! function_exists('isActive')) {
    function isActive($pattern) {
        $path = request()->path();

        return preg_match($pattern, $path);
    }
}
