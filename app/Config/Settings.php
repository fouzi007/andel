<?php
use App\SiteSettings;

function settings($var) {
  return SiteSettings::first()->$var;
}

function featured_event() {
    return \App\Event::where('id',settings('featured_event_id'))->first();
}
