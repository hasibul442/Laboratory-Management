<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XrayReport extends Model
{
    use HasFactory;
    public $table = "testreport";
    public $fillable = [ 'patient_id','order_id',
    'test_id',
    'image',
    'upload_by',
    'status'];

    public function users(){
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function test(){
        return $this->belongsTo(LabTestCat::class, 'test_id');
    }
    public function patients(){
        return $this->belongsTo(Patients::class, 'patient_id','user_id');
    }
}
