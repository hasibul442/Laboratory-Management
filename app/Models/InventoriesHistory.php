<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoriesHistory extends Model
{
    use HasFactory;
    protected $fillable = ['inventories_id', 'brandname', 'shopname', 'quentity', 'amount', 'dateofpurches', 'document'];
    protected $table = 'inventorieshistory';

    public function inventories()
    {
        return $this->belongsTo(Inventories::class, 'inventories_id');
    }
}
