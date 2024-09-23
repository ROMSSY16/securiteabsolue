<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('no_telephone')->nullable();
            $table->string('no_telephone2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('horaires')->nullable();
            $table->string('link_fb')->nullable();
            $table->string('link_tw')->nullable();
            $table->string('link_ld')->nullable();
            $table->string('localisation')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
