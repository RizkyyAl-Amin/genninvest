<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirecturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('direktur')->insert([
            [
                'id' => 1,
                'nama' => 'Dr. Farkhan, ST., MT.',
                'sambutan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad ratione nesciunt quas cumque rem dolorem ducimus optio sunt consequuntur sint..',
            ],
        ]);
    }
}
