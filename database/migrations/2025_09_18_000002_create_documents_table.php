<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            // link to document_types as per ERD
            $table->foreignId('document_type_id')
                ->constrained('document_types')
                ->cascadeOnDelete();

            // uploader
            $table->foreignId('uploader_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('file_path');
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('mime_type', 100)->default('application/pdf');

            $table->unsignedInteger('download_count')->default(0);
            $table->timestamp('uploaded_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['document_type_id', 'uploader_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
