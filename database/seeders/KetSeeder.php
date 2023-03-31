<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ket')->insert([
            ['ket' => 'Present'],
            ['ket' => 'Late'],
            ['ket' => 'Excused'],
            ['ket' => 'Absent']
        ]);
    }
}
