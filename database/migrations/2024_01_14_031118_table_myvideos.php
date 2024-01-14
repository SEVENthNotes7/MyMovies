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
        Schema::create('table_myvideos', function (Blueprint $table) {
            $table->id();
            $table->string('Authors_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('tumbnail')->nullable();
            $table->string('video')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_myvideos');
    }
};
