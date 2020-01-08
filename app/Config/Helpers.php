<?php

use Illuminate\Support\Str;

function sideMenuActive($path) {
    if(Str::startsWith(request()->path(),$path)) {
        return 'font-weight-bold';
    }
}

function tabMenuActive($path) {
    if(request()->path() == $path) {
        return 'active';
    }
}
