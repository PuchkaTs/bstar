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
    protected $fillable = ['name', 'position'];

    public function placeTypes(){
        return $this->hasMany('App\PlaceType', 'placeMenu_id');
    }

    public function getListForMenu(){

        $menus = Self::with(['placeTypes' => function ($query)
        {
            $query->orderBy('name', 'asc');
        }, 'placeTypes.places'         => function ($query)
        {
            $query->orderBy('position', 'desc');
        }
        ])->get();

        return $menus;

    }    
}
