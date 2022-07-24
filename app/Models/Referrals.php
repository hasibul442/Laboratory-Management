<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referrals extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'address', 'balance', 'amount', 'percentage', 'hospitalname'];
    protected $table = 'referrals';
}
