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

    public function promotions()
    {
        return $this->belongsToMany('App\Promotion', 'menu_promotion', 'menu_id', 'promotion_id');
    }    

    public function companies(){
        return $this->hasMany('App\Company', 'menu_id');
    }

    public function getListForMenu(){

        $menus = Self::orderBy('position', 'asc')->with(['promotions' => function ($query)
        {
            $query->orderBy('position', 'asc');
        }, 'companyTypes' => function ($query)
        {
            $query->orderBy('position', 'asc');
        }, 'companyTypes.companies'         => function ($query)
        {
            $query->orderBy('position', 'asc');
        }
        ])->get();

        return $menus;

    }        
}
