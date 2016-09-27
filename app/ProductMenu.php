<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productmenus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position'];

    public function productTypes(){
        return $this->hasMany('App\ProductType', 'productmenu_id');
    }

    public function promotions(){
        return $this->belongsToMany('App\Promotion', 'productmenu_promotion', 'productmenu_id', 'promotion_id');
    }  

    public function getListForMenu(){

        $menus = Self::orderBy('position', 'asc')->with(['promotions' => function ($query)
        {
            $query->orderBy('position', 'asc');
        }, 'productTypes' => function ($query)
        {
            $query->orderBy('position', 'asc');
        }, 'productTypes.subtypes'         => function ($query)
        {
            $query->orderBy('position', 'asc');
        }, 'productTypes.products'         => function ($query)
        {
            $query->orderBy('name', 'asc');
        }
        ])->get();

        return $menus;

    }
}
