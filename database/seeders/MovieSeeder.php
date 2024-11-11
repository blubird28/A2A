<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('movies')->insert([
            ['title' => 'Movie 1'],
            ['title' => 'Movie 2'],
        ]);
    }
}
