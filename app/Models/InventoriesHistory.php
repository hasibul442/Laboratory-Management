<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoriesHistory extends Model
{
    use HasFactory;
   
    protected $table = 'inventorieshistory';

    public function inventories()
    {
        return $this->belongsTo(Inventories::class, 'inventories_id');
    }
}
