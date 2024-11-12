<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

//php artisan make:seeder CategorySeeder               //to create seeder
//php artisan db:seed --class=CategorySeeder           //to run seed

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            "name"=>"laptop",
            "desc"=>"laptop desc"
        ]);
    }
}
