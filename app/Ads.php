<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';

    protected $fillable = ['title', 'price', 'phone', 'description', 'position', 'gender'];

    public function location(){
        return $this->belongsTo('App\Adslocation', 'location_id');
    }

    public function adsage(){
    	return $this->belongsTo('App\Age', 'age_id');
    }

    public function adstag(){
    	return $this->belongsTo('App\Adstag', 'adsTag_id');
    }

    public function images(){
        return $this->hasMany('App\Adsimage', 'ads_id');
    }    

    public function shorten($num = 100){

        $string = strip_tags($this->description);

        $string = str_limit($string, $limit = $num, $end = '...');

        return $string;

    }        
}
