<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ubigeo';
    protected $guarded = [
        'ubigeo_id',
        'ubigeo_created_at'=>'created_at',
        'ubigeo_updated_at'=>'updated_at'
    ];
    
    protected $primaryKey = 'ubigeo_id';

    protected $filliable = [
        'ubigeo_country',
        'ubigeo_department',
        'ubigeo_municipality',
    ];
}
