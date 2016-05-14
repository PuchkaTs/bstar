<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'maps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['location_name', 'xloc', 'yloc'];

    public function company(){
        return $this->belongsTo('App\Company');
    }

}
