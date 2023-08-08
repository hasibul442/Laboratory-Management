<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    protected $table = 'bills';

    // public function users(){
    //     return $this->belongsTo(User::class, 'patient_id','id');
    // }
    public function patients(){
        return $this->belongsTo(Patients::class, 'patient_id','id');
    }
}
