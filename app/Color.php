<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'color', 'position'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'color_product');
    }
}
