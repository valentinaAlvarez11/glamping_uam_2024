<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('services')->insert([
            ['name' => 'Jacuzzi'],
            ['name' => 'Cama doble'],
            ['name' => 'Vista panorámica'],
            ['name' => 'Secador de pelo'],
    }
}
