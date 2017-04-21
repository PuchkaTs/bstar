<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aztan extends Model
{
    protected $table = 'aztan';

    protected $fillable = ['id', 'social_id'];
}
