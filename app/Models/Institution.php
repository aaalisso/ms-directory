<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'institution';
    protected $guarded = [
        'institution_id',
        'institution_created_at'=>'created_at',
        'institution_updated_at'=>'updated_at'
    ];
    
    protected $primaryKey = 'institution_id';

    protected $filliable = [
        'institution_name',
        'institution_address',
        'institution_phone',
        'institution_web_page',
        'institution_logo',
        'ubigeo_id'
    ];
}
