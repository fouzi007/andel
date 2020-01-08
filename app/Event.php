<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at','updated_at','date_start','date_end'];

    /**
     * @return mixed
     */
    public function getLatitudeAttribute() {
        if($this->coordonnes !== null) {
            return json_decode($this->coordonnes)[0]->lat;
        }
    }


    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * @return mixed
     */
    public function getLongitudeAttribute() {
        if($this->coordonnes !== null) {
            return json_decode($this->coordonnes)[0]->long;
        }
    }

}
