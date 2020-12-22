<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeComposition extends Model
{
    use HasFactory;
    protected $fillable =[
    'id', 'name', 'company_name', 'company_id', 'director_id', 'committee_id', 'director_name', 'type', 'created_at', 'updated_at'
    	];
      public function committee()
    {
        return $this->belongsTo('App\Models\Committee');
    }
}
