<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function events() {
        return $this->belongsToMany(Event::class,'user_events','user_id','event_id')->withPivot(['is_active']);
    }

    /**
     * @param $event
     *
     * @return bool
     */
    public function alreadyRegistred( $event ) {
        return $this->events()->find($event) !== null;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
      return $this->nom . ' ' . $this->prenom;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adhesions() {
        return $this->hasMany(Adhesion::class,'user_id','id');
    }

    /**
     * @return bool
     */
    public function estAdherent() {
        return $this->adhesions()->where('status',true)->count() !== 0;
    }

    public function getActiveAdhesionAttribute() {
        return $this->adhesions()->where('status',true)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role() {
        return $this->hasOne(Role::class,'id','role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wilaya() {
        return $this->hasOne(Wilaya::class,'id','wilaya_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles() {
        return $this->hasMany(Article::class,'created_by_id','id');
    }
}
