<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model {

    protected $table = 'productimages';
    protected $fillable = ['name', 'description', 'image', 'color'];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }

}
