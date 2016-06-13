<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'year', 'cover', 'logo', 'about', 'address', 'phone', 'facebook',
    'twitter', 'website', 'youtube'];

    public function placeType(){
        return $this->belongsTo('App\PlaceType', 'placeType_id');
    }

    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }

    // public function products(){
    //     return $this->hasMany('App\Product');
    // }

    public function maps(){
        return $this->belongsTo('App\Map');
    }
}
