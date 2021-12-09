<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

               /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'email',
        'password',
        'instagram_url',
        'facebook_url',
        'linkedin_url',
        'registration_date',
        'registration_time',
        'ip_address',
        'recovery_email',
        'status',
     
    ];
}
