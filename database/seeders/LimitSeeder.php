<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('limits')->insert([
            ['title_limit'=>'Нет ограничений'],
            ['title_limit'=>'Нарушение'],
            ['title_limit'=>'Тенвой бан'],
            ['title_limit'=>'Бан'],
        ]);
    }
}
