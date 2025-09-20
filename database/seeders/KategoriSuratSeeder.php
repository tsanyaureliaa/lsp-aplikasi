<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriSurat;

class KategoriSuratSeeder extends Seeder
{
    public function run(): void
    {
        KategoriSurat::create([
            'nama' => 'Pengumuman',
            'keterangan' => 'Surat-surat yang terkait dengan pengumuman',
        ]);
        KategoriSurat::create([
            'nama' => 'Undangan',
            'keterangan' => 'Undangan rapat, koordinasi, dlsb.',
        ]);
    }
}
