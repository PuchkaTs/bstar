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
    protected $fillable = ['name', 'position', 'product_number'];

    public function productmenu(){
        return $this->belongsTo('App\ProductMenu');
    }

    public function products(){
        return $this->hasMany('App\Product', 'productType_id');
    }

    public function productsInMenu(){
        $listedProducts = '';
        $count = 0;
        $limit = $this->product_number;
      
        foreach ($this->products as $product){
            $listedProducts .= '<li class="">' . link_to_route('product_path', $product->name, $product->id)  . '</li>';
            $count++;
            if ($count == $limit) {
                break;
            }
        }
        return $listedProducts;
    }
}
