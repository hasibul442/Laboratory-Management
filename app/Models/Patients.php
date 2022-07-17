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
        'home_phone',
       ' mobile_phone',
        'lmp',
        'age',
        'gender',
        'address',
        'blood_group',
        'note',
        'bp',
        'height',
        'weight',
        'referred_by',
        'registerd_by',
        'aprrovel_by',
    ];
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function referral(){
        return $this->belongsTo(Referrals::class, 'referred_by');
    }
}
