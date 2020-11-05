<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyFinancial extends Model
{
    use HasFactory;
    protected $fillable =[
     	'id', 'company_id', 'year', 'sale_revenue', 'underlying_profit', 'a_c_i', 'roci', 'weight_share', 'basic_eps', 'free_cashflow', 'market_cap', 'created_at', 'updated_at'
     ];
     public function company()
	{
		return $this->belongsTo('App\Models\Company');
	}

}
