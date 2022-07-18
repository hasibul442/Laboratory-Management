<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $fillable = ['bill_no', 'patient_id', 'all_test', 'net_price', 'discount', 'total_price', 'paid_amount', 'due_amount', 'payment_type', 'approved_code', 'barcode', 'employee_name'];
    protected $table = 'bills';
    // protected $casts = [
    //     'all_test' => 'array',
    // ];
    public function patient(){
        return $this->belongsTo(Patients::class, 'patient_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'patient_id');
    }
}
