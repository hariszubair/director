<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherMembership extends Model
{
    use HasFactory;
    protected $fillable =[
     	'type','organization','director_id'

     ];
}
