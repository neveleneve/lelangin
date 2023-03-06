<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'administrator@lelangin.store',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
            'level' => '0',
            'last_active' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
