<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = ['body', 'title', 'photo', 'position'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    } 
       
    public function shorten($num = 100){

        $string = strip_tags($this->body);

        $string = str_limit($string, $limit = $num, $end = '...');

        return $string;

    }   

    public function shortenTitle($num = 100){

        $string = strip_tags($this->title);

        $string = str_limit($string, $limit = $num, $end = '...');

        return $string;

    }       

    public function allow_new_line(){

	    return strip_tags(nl2br($this->body), '<br><br/>');

	}

    public function getLatestNews(){

        $list = Self::latest()->limit(5)->get();

        return $list;

	}

    public function getLatestId(){
        $id = Self::latest()->first()->id;

        return $id;
    }


}
