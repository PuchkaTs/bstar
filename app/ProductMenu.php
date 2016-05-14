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

    public function getListForMenu(){

        $menus = Self::with(['productTypes' => function ($query)
        {
            $query->orderBy('name', 'asc');
        }, 'productTypes.products'         => function ($query)
        {
            $query->orderBy('position', 'desc');
        }
        ])->get();
        return $menus;

    }
}
