<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Partner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partners')->insert([
            "name"=>"Elhasna",
            "testimony"=>" “Candidax sangat membantu proses rekrutmen karyawan kami secara profesional dan menyeluruh, terlebih untuk posisi-posisi strategis mulai dari level pemula hingga berpengalaman.”",
            "rating"=>4,
            "foto"=>null,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
        //
    }
}
