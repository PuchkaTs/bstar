<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['body', 'title', 'photo', 'position', 'approved'];

    public function tag()
    {
        return $this->belongsTo('App\Tagpost', 'tagpost_id');
    }    

    public function shorten($num = 100){

        $string = strip_tags($this->body);

        $string = str_limit($string, $limit = $num, $end = '...');

        return $string;

    }    

    public function allow_new_line(){

	    return strip_tags(nl2br($this->body), '<br><br/>');

	}

    public function getLatestNews(){

        $list = Self::latest()->limit(4)->get();

        return $list;

	}
}
