<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubType extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productsubtypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'product_number'];

    public function producttype(){
        return $this->belongsTo('App\ProductType', 'producttype_id');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'product_productsubtype', 'subtype_id', 'product_id');
    }
}
