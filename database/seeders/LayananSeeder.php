<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $services = [
            [
                'nama' => 'Security Service',
                'icon' => 'fa-solid fa-shield-halved',
                'benner' => 'https://images.unsplash.com/photo-1574169208507-84376144848b?auto=format&fit=crop&q=80',
                'deskripsi' => 'Penyediaan tenaga satuan pengamanan yang tanggap, terlatih, dan bersertifikat untuk menjaga aset dan lingkungan Anda dengan standar operasional yang ketat.',
                'lingkup_layanan' => [
                    'Pengamanan Area Komersial & Industri',
                    'Pengamanan VIP & Event',
                    'Patroli Lingkungan 24 Jam',
                    'Konsultasi Sistem Keamanan Terpadu',
                ],
                'foto' => [
                    'https://images.unsplash.com/photo-1557555187-23d685287bc3?auto=format&fit=crop&q=80',
                ],
            ],
            [
                'nama' => 'Cleaning Service',
                'icon' => 'fa-solid fa-sparkles',
                'benner' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&q=80',
                'deskripsi' => 'Layanan kebersihan profesional dengan tenaga terdidik dan peralatan modern, menciptakan lingkungan yang bersih, sehat, dan nyaman untuk aktivitas Anda.',
                'lingkup_layanan' => [
                    'Pembersihan Kaca Gedung Bertingkat',
                    'Perawatan Lantai Marmer & Granit',
                    'General Cleaning',
                    'Hygiene & Sanitation Service',
                ],
                'foto' => [
                    'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&q=80',
                ],
            ],
            [
                'nama' => 'Outsourcing Service',
                'icon' => 'fa-solid fa-users-gear',
                'benner' => 'https://images.unsplash.com/photo-1541888087525-2bf74d711c20?auto=format&fit=crop&q=80',
                'deskripsi' => 'Penyediaan tenaga kerja pendukung operasional yang handal dan profesional, disesuaikan dengan kebutuhan spesifik perusahaan Anda.',
                'lingkup_layanan' => [
                    'Tenaga Administrasi & Resepsionis',
                    'Driver & Kurir',
                    'Tenaga Kasir & Pramuniaga',
                    'Penyaluran Tenaga Teknis Khusus',
                ],
                'foto' => [
                    'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&q=80',
                ],
            ],
        ];

        foreach ($services as $service) {
            Layanan::updateOrCreate(
                ['nama' => $service['nama']],
                [
                    'benner' => $service['benner'],
                    'icon' => $service['icon'],
                    'deskripsi' => $service['deskripsi'],
                    'lingkup_layanan' => $service['lingkup_layanan'],
                    'foto' => $service['foto'],
                    'active' => true,
                    'created_by' => 1,
                ],
            );
        }
    }
}
