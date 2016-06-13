<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adslocation extends Model
{
    protected $table = 'adslocation';

    protected $fillable = ['name', 'position'];

    public function ads(){
        return $this->hasMany('App\Ads', 'location_id');
    }
}
