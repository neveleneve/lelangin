<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidLot extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }
}
