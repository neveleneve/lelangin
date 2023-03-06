<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    public function bidlots()
    {
        return $this->hasMany(BidLot::class, 'id', 'item_id');
    }

    public function users()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
