<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['totalPrice', 'totalItems', 'phone', 'address', 'transactionNumber', 'body', 'delivered', 'phone2'];  

    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }  
}
