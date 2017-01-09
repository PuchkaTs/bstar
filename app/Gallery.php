<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'gallery_product');
    }

    public function getListForReklam()
    {
    	$reklam = Self::where('position', 1)->first();
        return $reklam->products;
    }
    public function getListForSpecial()
    {
        $list = Self::where('position', 2)->first();
        if($list){
            return $list->products()->limit(12)->orderBy('created_at', 'dsc')->get();
        }
        return false;
    }
    public function getListForBest()
    {
        $list = Self::where('position', 3)->first();
        if($list){
            return $list->products()->limit(12)->orderBy('created_at', 'dsc')->get();
        }
        return false;
    }
}
