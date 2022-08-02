<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','enter_date','enter_time','exit_date','exit_time'];
    protected $table = 'attendances';

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
