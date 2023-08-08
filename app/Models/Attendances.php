<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;
    protected $table = 'attendances';

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function employees(){
        return $this->belongsTo(Employees::class, 'user_id','user_id');
    }
}
