<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                "title" => "Ini Event 1",
                "description" => "Ini Description Event 1",
                "foto" => null,
                "event_date" => null,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Ini Event 2",
                "description" => "Ini Description Event 2",
                "foto" => null,
                "event_date" => null,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "title" => "Ini Event 3",
                "description" => "Ini Description Event 3",
                "foto" => null,
                "event_date" => null,
                "created_at" => now(),
                "updated_at" => now()
            ]
            ]);
        //
    }
}
