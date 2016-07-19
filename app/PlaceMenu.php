<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceMenu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'placemenus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'deep'];

    public function placeTypes(){
        return $this->hasMany('App\PlaceType', 'placeMenu_id');
    }

    public function promotions(){
        return $this->belongsToMany('App\Promotion', 'placemenu_promotion', 'placemenu_id', 'promotion_id');
    } 

    public function places(){
        return $this->hasMany('App\Place', 'placemenu_id');
    }

    public function getListForMenu(){

        $menus = Self::orderBy('position', 'asc')->with(['promotions' => function ($query)
        {
            $query->orderBy('position', 'asc');
        }, 'placeTypes' => function ($query)
        {
            $query->orderBy('position', 'asc');
        }, 'placeTypes.places'         => function ($query)
        {
            $query->orderBy('position', 'asc');
        }
        ])->get();

        return $menus;

    }    
}
