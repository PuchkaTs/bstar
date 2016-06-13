<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adsimage extends Model
{
    protected $table = 'adsimages';

    protected $fillable = ['ip', 'image'];

    public function ads(){
        return $this->belongsTo('App\Ads', 'ads_id');
    }
}
