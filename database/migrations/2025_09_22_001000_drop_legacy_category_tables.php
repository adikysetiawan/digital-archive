<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop legacy tables that are no longer used
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('categories');
    }

    public function down(): void
    {
        // Intentionally left blank. These legacy tables are not meant to be restored.
    }
};
