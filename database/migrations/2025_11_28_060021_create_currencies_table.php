<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();   // USD, KHR
            $table->string('name');             // US Dollar, Cambodian Riel
            $table->string('symbol', 8);        // $, ៛
            // Base = USD -> rate_to_base = 1 for USD, 4100 (example) for KHR
            $table->decimal('rate_to_base', 16, 6)->default(1);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
