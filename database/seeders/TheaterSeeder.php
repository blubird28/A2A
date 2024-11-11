<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('theaters')->insert([
            ['name' => 'Theater 1'],
            ['name' => 'Theater 2'],
        ]);
    }
}
