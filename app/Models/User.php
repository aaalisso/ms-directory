<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'user';
    protected $guarded = [
        'user_id',
        'user_created_at'=>'created_at',
        'user_updated_at'=>'updated_at'
    ];
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_password',
        'user_state',
        'person_id',
    ];    
}
