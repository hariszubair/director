<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
     protected $fillable =[
     	'id', 'name', 'code', 'index', 'industry', 'no_of_employees', 'min_share_c_e', 'min_share_time_c_e', 'min_share_o_e', 'min_share_time_o_e', 'min_share_n_e', 'min_share_time_n_e','sector','dir_fee_pool','dir_fee_pool_updated','min_share_chair','min_share_time_chair'

     ];
      public function committee()
	{
		return $this->hasMany('App\Models\Committee');
	}
	public function financial()
	{
		return $this->hasOne('App\Models\CompanyFinancial')->latest();
	}
	public function company_director()
	{
		return $this->hasMany('App\Models\CompanyDirector');
	}
	
	 public function getDirFeePoolUpdatedAttribute($value)
    {
    	if($value != null){
    	 $date=date_create($value);
        return date_format($date,"d-m-Y");	
    	}
       
    }
     public function getDirFeePoolAttribute($value)
    {
       return number_format($value);
    }
    public function getNoOfEmployeesAttribute($value)
    {
       return number_format($value);
    }
}
