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
        Schema::create('capsters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tempat_tinggal');
            $table->string('phone')->unique();
            $table->string('email')->nullable()->unique();
            $table->integer('experience')->default(0)->nullable();
            $table->string('specialization')->nullable();
            $table->boolean('available')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capsters');
    }
};
