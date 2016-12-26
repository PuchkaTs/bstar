<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderedproduct extends Model
{
    protected $table = 'orderedproducts';

    protected $fillable = ['totalItems', 'phone', 'address', 'transactionNumber', 'delivered', 'oroldlogo'];  

    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }  

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }  

}
