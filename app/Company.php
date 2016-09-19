<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'year', 'cover', 'logo', 'about', 'address', 'phone', 'facebook',
    'twitter', 'website', 'youtube', 'searchWord'];

    public function companyType(){
        return $this->belongsTo('App\CompanyType', 'companyType_id');
    }

    public function companySubType(){
        return $this->belongsTo('App\CompanySubType', 'companysubtype_id');
    }

    public function companyMenu(){
        return $this->belongsTo('App\Menu', 'menu_id');
    }
    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function maps(){
        return $this->belongsTo('App\Map');
    }

    public function images(){
        return $this->hasMany('App\Companyimage', 'company_id');
    }    

    public function shorten($num = 50){

        $string = strip_tags($this->about);

        $string = str_limit($string, $limit = $num, $end = '...');

        return $string;
    }    
}
