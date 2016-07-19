<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceSubType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'placesubtypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'company_number'];

    public function placetype(){
        return $this->belongsTo('App\PlaceType', 'placetype_id');
    }

    public function places(){
        return $this->hasMany('App\Place', 'placesubtype_id');
    }
}
