<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        Surat::create([
            'nomor' => '2022/PD3/TU/001',
            'kategori' => 'Pengumuman',
            'judul' => 'Nota Dinas WFH',
            'file' => 'nota_wfh.pdf',
        ]);
        Surat::create([
            'nomor' => '2022/PD2/TU/022',
            'kategori' => 'Undangan',
            'judul' => 'Undangan Halal Bi Halal',
            'file' => 'undangan_halal.pdf',
        ]);
    }
}
