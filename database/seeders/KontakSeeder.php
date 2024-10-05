<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kontak')->insert([
            [
                'id' => 1,
                'alamat' => 'Jl Letkol Atang Sanjaya KM 02 Bogor',
                'email' => 'official@pdbi.ac.id',
                'no_hp' => '085150577200',
                'fb_url' => 'https://www.facebook.com/pdbiofficial',
                'ig_url' => 'https://www.instagram.com/boashpoldibi',
                'yt_url' => 'https://www.youtube.com/channel/UCTSp14Z3gwFZDYMGr29V52A',
            ],
        ]);
    }
}
