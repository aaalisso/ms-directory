<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution_Person extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'institution_person';
    protected $guarded = [
        'id',
        'inst_pers_created_at'=>'created_at',
        'inst_pers_updated_at'=>'updated_at'
    ];
    protected $primaryKey = 'id';

    protected $filliable = [        
        'institution_id',
        'person_id',
        'occupation',
        'institutional_email',
        'incorporation_date'
    ];
}
