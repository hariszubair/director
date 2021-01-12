<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $fillable =[
     	'name', 'gender', 'dob', 'age', 'qualification', 'institute', 'created_at', 'updated_at'

     ];
     public function company_director()
	{
		return $this->hasMany('App\Models\CompanyDirector');
	}
	public function committee_composition()
	{
		return $this->hasMany('App\Models\CommitteeComposition');
	}
	public function getNameAttribute($value)
    {
       return ucwords(strtolower($value) );
    }
}
