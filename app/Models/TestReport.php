<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestReport extends Model
{
    use HasFactory;
    public $table = "testreports";

    public function users(){
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function test(){
        return $this->belongsTo(LabTestCat::class, 'test_id');
    }
    public function invoice(){
        return $this->belongsTo(Bills::class, 'invoice_id','id');
    }
    public function patients(){
        return $this->belongsTo(Patients::class, 'patient_id','id');
    }
}
