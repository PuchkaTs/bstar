<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companyTypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'comp_number'];


    public function menu(){
        return $this->belongsTo('App\Menu');
    }

    public function companySubTypes(){
        return $this->hasMany('App\CompanySubType', 'companytype_id');
    } 

    public function companies(){
        return $this->hasMany('App\Company', 'companyType_id');
    }

    public function companiesInMenu(){
        $listedCompanies = '';
        $count = 0;
        $limit = $this->comp_number;
        foreach ($this->companies as $company){
            $listedCompanies .= '<li class="">' .  link_to_route('store_path', $company->name, $company->url) . '</li>';
            $count++;
            if ($count == $limit) {
                break;
            }
        }
        return $listedCompanies;
    }
    public function subTypesInMenu(){
        $listedSubTypes = '';
        $count = 0;
        $limit = $this->comp_number;
        foreach ($this->companySubTypes as $subtype){
            $listedSubTypes .= '<li class="">' .  link_to_route('companySubType_path', $subtype->name, $subtype->id) . '</li>';
            $count++;
            if ($count == $limit) {
                break;
            }
        }
        return $listedSubTypes;
    }     
}
