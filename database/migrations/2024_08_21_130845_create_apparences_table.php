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
        Schema::create('apparences', function (Blueprint $table) {
            $table->id();
            $table->string('slide1_image')->nullable();
            $table->string('slide1_titre')->nullable();
            $table->longText('slide1_description')->nullable();
            $table->string('slide1_button_title')->nullable();
            $table->string('slide1_button_link')->nullable();
            $table->string('section1_title')->nullable();

            $table->string('slide2_image')->nullable();
            $table->string('slide2_titre')->nullable();
            $table->longText('slide2_description')->nullable();
            $table->string('slide2_button_title')->nullable();
            $table->string('slide2_button_link')->nullable();
            $table->string('section2_title')->nullable();
            
            $table->string('slide3_image')->nullable();
            $table->string('slide3_titre')->nullable();
            $table->longText('slide3_description')->nullable();
            $table->string('slide3_button_title')->nullable();
            $table->string('slide3_button_link')->nullable();
            $table->string('section3_title')->nullable();
            
            $table->string('image_atout')->nullable();
            $table->string('image_bg')->nullable();
            $table->string('video_image')->nullable();
            $table->string('video_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apparences');
    }
};
