<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCompanys extends Model
{
    use HasFactory;
    protected $fillable = ['lab_name', 'lab_address', 'lab_phone', 'lab_email', 'banance'];
    protected $table = 'companys';

}
