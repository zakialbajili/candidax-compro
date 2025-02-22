<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                "title" => "Ini Title 1",
                "description" => "Ini Description Title 1",
                "foto" => null,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Ini Title 2",
                "description" => "Ini Description Title 2",
                "foto" => null,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Ini Title 3",
                "description" => "Ini Description Title 3",
                "foto" => null,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
