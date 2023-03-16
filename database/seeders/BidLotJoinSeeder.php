<?php

namespace Database\Seeders;

use App\Models\BidLotJoin;
use Illuminate\Database\Seeder;

class BidLotJoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidLotJoin::insert([
            [
                'bid_lot_id' => 1,
                'user_penawar_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'bid_lot_id' => 1,
                'user_penawar_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
