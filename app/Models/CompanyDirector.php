<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDirector extends Model
{
    use HasFactory;
     protected $fillable =[
     	'id', 'company_name', 'company_id', 'director_id', 'director_name', 'ned_type', 'independent_type', 'status', 'board', 'joining_date', 'leaving_date', 'director_fee', 'superannuation', 'other_fee', 'vested_share', 'unvested_share', 'committee_fee', 'total_fee', 'created_at', 'updated_at'
     ];
    public function company()
	{
		return $this->belongsTo('App\Models\Company');
	}
	public function director()
	{
		return $this->belongsTo('App\Models\Director');
	}
	 public function getJoiningDateAttribute($value)
    {
    	if($value != null){
    	 $date=date_create($value);
        return date_format($date,"d-m-Y");	
    	}
       
    }
     public function getLeavingDateAttribute($value)
    {
       if($value != null){
    	 $date=date_create($value);
        return date_format($date,"d-m-Y");	
    	}
    }
       public function committee()
    {
        return $this->hasMany('App\Models\Committee','company_id','company_id');
    }
    public function financial()
    {
        return $this->hasOne('App\Models\CompanyFinancial')->latest();
    }
}
