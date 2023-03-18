<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'role';
    protected $guarded = [
        'role_id',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'role_description',
    ]; 
}
