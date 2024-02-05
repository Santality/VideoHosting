<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['title_category'=>'Юмор'],
            ['title_category'=>'Познавательное'],
            ['title_category'=>'Наука'],
            ['title_category'=>'Технологии'],
        ]);
    }
}