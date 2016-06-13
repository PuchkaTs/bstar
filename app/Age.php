<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $table = 'ages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'position'];

    public function ads()
    {
        return $this->hasMany('App\Ads', 'age_id');
    }   

    public function products()
    {
        return $this->belongsToMany('App\Product', 'age_product');
    }
 
}
