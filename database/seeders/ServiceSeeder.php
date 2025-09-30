<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Categories (level teratas: parent_id = null)
        $magang = Service::create([
            'name' => 'Permohonan Magang',
        ]);

        $arsip = Service::create([
            'name' => 'Arsip',
        ]);

        $dinkes = Service::create([
            'name' => 'Dinas Kesehatan',
        ]);

        $dishub = Service::create([
            'name' => 'Dinas Perhubungan',
        ]);

        // Subcategory di bawah Dinas Kesehatan
        Service::create([
            'parent_id' => $dinkes->id,
            'name' => 'Pelayanan Kesehatan',
        ]);
    }
}
