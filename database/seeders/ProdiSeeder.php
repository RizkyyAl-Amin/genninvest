<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            [
                'id' => 1,
                'thumbnail' => 't_prodi1.jpg',
                'logo' => 'l_prodi1.jpg',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!.',
                'nama_prodi' => 'Computer Science',
            ],

            [
                'id' => 2,
                'thumbnail' => 't_prodi2.png',
                'logo' => 'l_prodi2.png',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum error explicabo optio libero est officia provident sequi ipsa? Voluptatem quaerat maxime nulla magnam cupiditate consequuntur sit iusto vel commodi voluptates!.',
                'nama_prodi' => 'Information Security',
            ],
        ];

        foreach ($prodis as $prodiData) {
            // Simulasi upload foto ke direktori publik
            $this->uploadPhoto($prodiData['thumbnail']);
            $this->uploadPhoto($prodiData['logo']);
            
            // Simpan data ke database
            Prodi::updateOrCreate(
                ['id' => $prodiData['id']], // Cari berdasarkan id
                [
                    'deskripsi' => $prodiData['deskripsi'],
                    'logo' => $prodiData['logo'],
                    'thumbnail' => $prodiData['thumbnail'],
                    'nama_prodi' => $prodiData['nama_prodi'],
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

