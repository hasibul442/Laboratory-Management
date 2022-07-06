<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'user_id',
        'employee_id',
        'address',
        'phone',
        'image',
        'dob',
        'position',
        'join_of_date',
        'salary',
    ];
}
