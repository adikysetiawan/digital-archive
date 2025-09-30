<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DocumentType;
use App\Models\Service;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Cari subkategori contoh dari services (parent_id != null)
        // Prioritaskan "Pelayanan Kesehatan" jika ada (dibuat oleh ServiceSeeder)
        $subcategory = Service::whereNotNull('parent_id')
            ->where('name', 'Pelayanan Kesehatan')
            ->first();

        if (! $subcategory) {
            // fallback: ambil subkategori pertama yang tersedia
            $subcategory = Service::whereNotNull('parent_id')->first();
        }

        if (! $subcategory) {
            // Jika belum ada data service sama sekali, buat minimal 1 kategori & 1 subkategori
            $category = Service::create(['name' => 'Kategori Umum']);
            $subcategory = Service::create(['name' => 'Subkategori Umum', 'parent_id' => $category->id]);
        }

        $types = [
            'Surat Permohonan',
            'Surat Rekomendasi',
            'Laporan Kegiatan',
            'Surat Keterangan',
            'Dokumen Pendukung',
        ];

        foreach ($types as $name) {
            DocumentType::firstOrCreate([
                'service_id' => $subcategory->id,
                'name' => $name,
            ]);
        }
    }
}
