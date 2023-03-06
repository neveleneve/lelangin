<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    public function bidlots()
    {
        return $this->belongsTo(BidLot::class, 'id', 'bid_lot_id');
    }
}
