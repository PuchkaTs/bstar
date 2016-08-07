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

    public function placeSubType(){
        return $this->belongsTo('App\PlaceSubType', 'placesubtype_id');
    }

    public function placeMenu(){
        return $this->belongsTo('App\PlaceMenu', 'placemenu_id');
    }        

    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function images(){
        return $this->hasMany('App\Placeimage', 'place_id');
    }  

    // public function products(){
    //     return $this->hasMany('App\Product');
    // }

    public function maps(){
        return $this->belongsTo('App\Map');
    }


    public function shorten($num = 50){

        $string = strip_tags($this->about);

        $string = str_limit($string, $limit = $num, $end = '...');

        return $string;
    }       
}
