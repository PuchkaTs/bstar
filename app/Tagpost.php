<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagpost extends Model
{
    protected $table = 'tagposts';

    protected $fillable = ['title', 'position'];

    public function posts()
    {
        return $this->hasMany('App\Post', 'tagpost_id');
    } 

    public function tagnames()
    {
    	$tagnames = self::lists('title', 'title');

    	return $tagnames;
    }    
}
