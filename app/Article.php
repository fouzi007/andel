<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public $appends = ['auteur'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function user() {
        return $this->hasOne(User::class,'id','created_by_id');
    }

    public function getAuteurAttribute() {
        return $this->user->name;
    }

    public function scopePubliable($query) {
        return $query->orderBy('created_at','desc')->where('is_published',true);
    }
}
