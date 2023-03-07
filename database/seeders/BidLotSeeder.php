<?php

namespace Database\Seeders;

use App\Models\BidLot;
use Illuminate\Database\Seeder;

class BidLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidLot::insert([
            [
                'item_id' => 1,
                'kode_lot' => $this->randomString(),
                'harga_awal' => 120000,
                'waktu_mulai' =>  strtotime(date('Y-m-d H') . ':00:00'),
                'waktu_selesai' => strtotime(date('Y-m-d H', strtotime('+7 hour')) . ':00:00'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'item_id' => 2,
                'kode_lot' => $this->randomString(),
                'harga_awal' => 200000,
                'waktu_mulai' =>  strtotime(date('Y-m-d H') . ':00:00'),
                'waktu_selesai' => strtotime(date('Y-m-d H', strtotime('+8 hour')) . ':00:00'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }

    public function randomString($len = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $len; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }
}
