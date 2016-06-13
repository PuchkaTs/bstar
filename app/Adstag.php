<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adstag extends Model
{
    protected $table = 'adstag';

    protected $fillable = ['name', 'position'];

    public function ads(){
        return $this->hasMany('App\Ads', 'adsTag_id');
    }
}
