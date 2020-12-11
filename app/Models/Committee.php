<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;
    protected $fillable =[
     	'id', 'name','company_name','company_id','chair_fee','member_fee','no_of_meetings'
     ];
     public function company()
	{
		return $this->belongsTo('App\Models\Company');
	}
		  public function composition()
	{
		return $this->hasMany('App\Models\CommitteeComposition');
	}
	 public function getChairFeeAttribute($value)
    {
      if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
    public function getMemberFeeAttribute($value)
    {
       if ($this->preventAttrSet) {
        // Ignore Mutator
            return $value;
    } else {
        return number_format($value);
    }
    }
}
