<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('services')
                ->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
            $table->index(['parent_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
