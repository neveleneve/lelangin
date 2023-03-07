<?php

namespace Database\Seeders;

use App\Models\Bid;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bid::insert([
            [
                'bid_lot_id' => 1,
                'user_penawar_id' => 3,
                'penawaran' => 130000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'bid_lot_id' => 1,
                'user_penawar_id' => 4,
                'penawaran' => 150000,
                'created_at' => date('Y-m-d H:i:s', strtotime('+3 minute')),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
