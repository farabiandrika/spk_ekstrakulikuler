<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EkstrakulikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ekstrakulikuler')->insert([
            'nama' => 'sepak bola',
        ]);
        DB::table('ekstrakulikuler')->insert([
            'nama' => 'basket',
        ]);
        DB::table('ekstrakulikuler')->insert([
            'nama' => 'badminton',
        ]);
        DB::table('ekstrakulikuler')->insert([
            'nama' => 'pramuka',
        ]);
    }
}
