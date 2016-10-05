<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oduntag extends Model
{
    protected $table = 'oduntags';

    protected $fillable = ['title', 'position'];

    public function contents()
    {
        return $this->hasMany('App\Oduncontent');
    }

    public function getListForMenu(){

        $menus = Self::orderBy('position', 'asc')->get();

        return $menus;

    }     
}
