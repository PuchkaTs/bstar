<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'producttypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'subtype_number'];

    public function productmenu(){
        return $this->belongsTo('App\ProductMenu');
    }

    public function subtypes(){
        return $this->hasMany('App\ProductSubType', 'producttype_id');
    }

    public function subTypesInMenu(){
        $listedSubTypes = '';
        $count = 0;
        $limit = $this->subtypenumber;
      
        foreach ($this->subtypes as $subtype){
            $listedSubTypes .= '<li class="">' . link_to_route('subtype_path', $subtype->name, $subtype->id)  . '</li>';
            $count++;
            if ($count == $limit) {
                break;
            }
        }
        return $listedSubTypes;
    }
}
