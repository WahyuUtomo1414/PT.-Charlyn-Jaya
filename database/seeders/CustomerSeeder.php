<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customers = [
            ['nama' => 'BPJS Kesehatan', 'kategori' => 'Kesehatan'],
            ['nama' => 'Amaris Hotel Ambon', 'kategori' => 'Hotel'],
            ['nama' => 'Pelabuhan Perikanan Nusantara Ambon', 'kategori' => 'Perikanan'],
            ['nama' => 'Hotel Everbright Ambon', 'kategori' => 'Hotel'],
            ['nama' => 'Satelit Nusantara Tiga Ambon', 'kategori' => 'Telekomunikasi'],
            ['nama' => 'Radio Republik Indonesia Ambon', 'kategori' => 'Media'],
            ['nama' => 'Pelabuhan Perikanan Nusantara Tual', 'kategori' => 'Perikanan'],
        ];

        foreach ($customers as $item) {
            Customer::updateOrCreate(
                ['nama' => $item['nama']],
                [
                    'kategori' => $item['kategori'],
                    'created_by' => 1,
                ],
            );
        }
    }
}
