<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['title', 'position'];

    public function contents()
    {
        return $this->belongsToMany('App\Content');
    }
   
}
