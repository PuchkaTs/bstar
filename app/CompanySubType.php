<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySubType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companysubtypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position', 'company_number'];

    public function companytype(){
        return $this->belongsTo('App\CompanyType', 'companytype_id');
    }

    public function companies(){
        return $this->hasMany('App\Company', 'companysubtype_id');
    }
}
