<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'user_id',
        'patient_id',
        'phone',
        'address',
        'blood_group',
        'age',
        'height',
        'aprrovel_by',
        'aprrovel_status',
    ];
}
