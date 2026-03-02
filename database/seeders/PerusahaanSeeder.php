<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Perusahaan::updateOrCreate(
            ['nama' => 'PT. Charlyn Jaya'],
            [
                'created_by' => 1,
                'tentang_kami' => 'PT. Charlyn Jaya berdiri pada tahun 2005 dengan awal kiprah di bidang konstruksi. Seiring kebutuhan pasar yang terus berkembang, pada tahun 2015 kami memperluas layanan menuju outsourcing tenaga keamanan (Security) dan tenaga kebersihan (Cleaning Service) secara terintegrasi.',
                'filosofi' => 'Menjadi mitra terpercaya dalam menciptakan lingkungan aman dan bersih. Kami memprioritaskan kualitas tenaga kerja melalui pelatihan rutin dan evaluasi berkala.',
                'visi' => 'Menjadi mitra terpercaya dalam penyediaan layanan keamanan dan kebersihan bagi instansi.',
                'misi' => [
                    'Menyediakan layanan terintegrasi',
                    'Penyediaan tenaga profesional dan terlatih',
                    'Pendekatan berbasis kebutuhan klien',
                    'Mengutamakan kepuasan klien',
                    'Melaksanakan tanggung jawab sosial',
                ],
            ],
        );
    }
}
