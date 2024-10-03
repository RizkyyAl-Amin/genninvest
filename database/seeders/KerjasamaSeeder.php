<?php

namespace Database\Seeders;

use App\Models\Kerjasama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KerjasamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kerjasama = [
            [
                'id' => 1,
                'judul' => 'Kerja sama dengan para alumni Universitas XYZ untuk penyaluran kerja Fresh Graduate',
                'thumbnail' => 't_kerjasama1.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!.',
                'tanggal' => '2024-10-10 10:00:00',
            ],
            [
                'id' => 2,
                'judul' => 'Perencanaan pembangunan bekerja sama dengan IKEA',
                'thumbnail' => 't_kerjasama1.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!.',
                'tanggal' => '2024-09-10 09:00:00',
            ],
        ];

        foreach ($kerjasama as $kerjaSama) {
            // Simulasi upload foto ke direktori publik
            $this->uploadPhoto($kerjaSama['thumbnail']);
            
            // Simpan data ke database
            Kerjasama::updateOrCreate(
                ['id' => $kerjaSama['id']], // Cari berdasarkan id
                [
                    'deskripsi' => $kerjaSama['deskripsi'],
                    'judul' => $kerjaSama['judul'],
                    'thumbnail' => $kerjaSama['thumbnail'],
                    'tanggal' => $kerjaSama['tanggal'],
                ]
            );
        }
    }
    
    protected function uploadPhoto($fileName)
    {
        // Path lokal untuk foto
        $localPath = base_path('database/seeders/images/prodi/' . $fileName);
        // Path publik untuk menyimpan foto
        $publicPath = public_path('img/uploaded_images/' . $fileName);

        // Salin foto dari folder seeders ke folder publik
        if (file_exists($localPath)) {
            copy($localPath, $publicPath);
        }
    }
}
