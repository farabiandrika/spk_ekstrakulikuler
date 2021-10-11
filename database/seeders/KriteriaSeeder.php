<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria')->insert([
            'nama' => 'minat',
            'bobot' => 1,
            'benefit' => 1,
        ]);
        DB::table('kriteria')->insert([
            'nama' => 'penghargaan',
            'bobot' => 2,
            'benefit' => 1,
        ]);
        DB::table('kriteria')->insert([
            'nama' => 'jarak',
            'bobot' => 3,
            'benefit' => 1,
        ]);
        DB::table('kriteria')->insert([
            'nama' => 'orang tua',
            'bobot' => 4,
            'benefit' => 1,
        ]);
    }
}
