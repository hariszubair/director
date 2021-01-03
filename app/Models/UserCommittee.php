<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCommittee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'map',
        'chair_fee','member_fee','no_of_meetings'
    ];
}
