<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position'];

    public function companyTypes(){
        return $this->hasMany('App\CompanyType');
    }
}
