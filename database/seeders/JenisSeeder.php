<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    public function run(): void
    {
        Jenis::create([
            'nama_jenis' => 'Makanan',
        ]);

        Jenis::create([
            'nama_jenis' => 'Minuman',
        ]);

        Jenis::create([
            'nama_jenis' => 'Snack',
        ]);
    }
}
