<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sales')->insert([
            ['movie_id' => 1, 'theater_id' => 1, 'sale_date' => '2024-05-09', 'amount' => 1500.00],
            ['movie_id' => 1, 'theater_id' => 2, 'sale_date' => '2024-05-09', 'amount' => 2500.00],
            ['movie_id' => 2, 'theater_id' => 1, 'sale_date' => '2024-05-10', 'amount' => 1700.00],
            ['movie_id' => 2, 'theater_id' => 2, 'sale_date' => '2024-05-10', 'amount' => 2000.00],
        ]);
    }
}
