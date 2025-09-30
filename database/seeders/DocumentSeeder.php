<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DocumentType;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure a default uploader exists
        $uploader = User::first() ?? User::factory()->create([
            'name' => 'Seeder Uploader',
            'email' => 'seeder@example.com',
            'password' => bcrypt('password'),
        ]);

        // Prepare a placeholder PDF content
        $types = DocumentType::query()->orderBy('id')->get();
        if ($types->isEmpty()) {
            return; // nothing to seed
        }

        foreach ($types as $type) {
            for ($i = 1; $i <= 3; $i++) {
                $title = $type->name . ' - Contoh Dokumen #' . $i;
                $slug = Str::slug($type->name);
                $relativeDir = 'dummy/' . $slug;
                $relativePath = $relativeDir . '/' . Str::slug($title) . '.pdf';

                // Ensure directory and file exist in storage/public
                if (!Storage::disk('public')->exists($relativeDir)) {
                    Storage::disk('public')->makeDirectory($relativeDir);
                }
                if (!Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->put($relativePath, "%PDF-1.4\n% Dummy PDF for seeding purposes\n");
                }

                Document::create([
                    'title' => $title,
                    'description' => 'Dokumen contoh untuk jenis: ' . $type->name,
                    'file_name' => basename($relativePath),
                    'file_path' => $relativePath,
                    'file_size' => Storage::disk('public')->size($relativePath) ?? rand(50_000, 500_000),
                    'mime_type' => 'application/pdf',
                    'document_type_id' => $type->id,
                    'uploaded_by' => $uploader->id,
                    'uploaded_at' => now()->subDays(rand(0, 90)),
                    'download_count' => rand(0, 100),
                    'is_public' => true,
                ]);
            }
        }
    }
}
