<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odun extends Model
{
    protected $table = 'oduns';

    protected $fillable = ['id', 'url', 'title', 'photo', 'photobottom', 'body', 'position'];

    public function getListForMenu(){

        $menus = Self::orderBy('position', 'asc')->get();

        return $menus;

    } 
}
