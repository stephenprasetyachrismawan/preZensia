<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('ket')->insert([
            ['ket' => 'Hadir'],
            ['ket' => 'Sakit'],
            ['ket' => 'Ijin'],
            ['ket' => 'Absen']
        ]);

        DB::table('roles')->insert([
            ['role' => 'Teacher'],
            ['role' => 'Student']
        ]);
    }
}
