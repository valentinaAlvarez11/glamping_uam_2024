<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'user_id' => 2,
                'cabin_id' => 1,
                'start_date' => '2024-11-25',
                'end_date' => '2024-11-28',
                'status' => 'confirmed',
            ],
            [
                'user_id' => 2,
                'cabin_id' => 2,
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-05',
                'status' => 'pending',
            ],
        ]);
    }
}
