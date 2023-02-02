<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'person';
    protected $guarded = [
        'person_id',
        'person_created_at'=>'created_at',
        'person_updated_at'=>'updated_at'
    ];
    protected $primaryKey = 'person_id';
    protected $fillable = [
        'person_name',
        'person_surname',
        'person_email',
        'person_identity_document',
        'person_address',
        'person_phone',
        'person_web_page',
        'person_profile_picture',
        'person_birthday_date',
        'ubigeo_id'
    ]; 
}
