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
     public function getDirectorFeeAttribute($value)
    {
       if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
    public function getSuperannuationAttribute($value)
    {
        if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
    public function getOtherFeeAttribute($value)
    {
       if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
    public function getVestedShareAttribute($value)
    {
        if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
    public function getUnvestedShareAttribute($value)
    {
       if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
    public function getCommitteeFeeAttribute($value)
    {
        if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
     public function getTotalFeeAttribute($value)
    {
        if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
      public function director_committee()
    {
        return $this->hasMany('App\Models\CommitteeComposition','director_id','director_id');
    }
      public function other_membership()
    {
        return $this->hasMany('App\Models\OtherMembership','director_id','director_id')->orderBy('type','asc');
    }
    public function getCompanyNameAttribute($value)
    {
       return ucwords(strtolower($value) );
    }
    public function getDirectorNameAttribute($value)
    {
       return ucwords(strtolower($value));
    }
    
}
