<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    protected $table = 'placeTypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'comp_number'];

    public function menu(){
        return $this->belongsTo('App\PlaceMenu', 'placeMenu_id');
    }

    public function places(){
        return $this->hasMany('App\Place', 'placeType_id');
    }

    public function placeSubTypes(){
        return $this->hasMany('App\PlaceSubType', 'placetype_id');
    }    

    public function placesInMenu(){
        $listedCompanies = '';
        $count = 0;
        $limit = $this->comp_number;
        foreach ($this->places as $company){
            $listedCompanies .= '<li class="">' .  link_to_route('place_path', $company->name, $company->url) . '</li>';
            $count++;
            if ($count == $limit) {
                break;
            }
        }
        return $listedCompanies;
    }
    public function subTypesInMenu(){
        $listedSubTypes = '';
        $count = 0;
        $limit = $this->comp_number;
        foreach ($this->placeSubTypes as $subtype){
            $listedSubTypes .= '<li class="">' .  link_to_route('placeSubType_path', $subtype->name, $subtype->id) . '</li>';
            $count++;
            if ($count == $limit) {
                break;
            }
        }
        return $listedSubTypes;
    }    
}
