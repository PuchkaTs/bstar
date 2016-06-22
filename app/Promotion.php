<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = ['url', 'image', 'position'];

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'menu_promotion', 'promotion_id', 'menu_id');
    }

    public function productmenus()
    {
        return $this->belongsToMany('App\ProductMenu', 'productmenu_promotion', 'promotion_id', 'productmenu_id');
    }    

    public function placemenus()
    {
        return $this->belongsToMany('App\PlaceMenu', 'placemenu_promotion', 'promotion_id', 'placemenu_id');
    }      
}
