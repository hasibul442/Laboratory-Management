<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients';

    // public function users(){
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    public function referral(){
        return $this->belongsTo(Referrals::class, 'referred_by');
    }
    public function bills(){
        return $this->belongsTo(Bills::class, 'user_id','patient_id');
    }
}
