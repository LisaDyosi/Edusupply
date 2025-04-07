<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stationery;

class StationerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stationery::insert([
            [
                'name' => 'Pens',
                'quantity' => 500
            ],
            [
                'name' => 'Pencils',
                'quantity' => 500
            ],
            [
                'name' => '72 Pages Exercise Book',
                'quantity' => 1000
            ],
            [
                'name' => '1 Quire Hardcover',
                'quantity' => 1000
            ],
            [
                'name' => '2 Quire Hardcover', 
                'quantity' => 1000
            ],
            [
                'name' => '3 Quire Hardcover', 
                'quantity' => 1000
            ],
            [
                'name' => 'Whiteboard Marker', 
                'quantity' => 50
            ],
            [
                'name' => 'Chalkboard Duster', 
                'quantity' => 30
            ],
            [
                'name' => 'White Chalk', 
                'quantity' => 50
            ],
            [
                'name' => 'Coloured Chalk', 
                'quantity' => 50
            ],
        ]);
    }
}
