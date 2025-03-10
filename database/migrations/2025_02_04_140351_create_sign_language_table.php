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
         // Create letters table
         Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->char('letter', 1);
            $table->string('image_path');
            $table->timestamps();
        });

        // Create words table
        Schema::create('numbers', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('image_path');
            $table->timestamps();
        });

        // Create phrases table
        Schema::create('phrases', function (Blueprint $table) {
            $table->id();
            $table->string('phrase');
            $table->string('video_path');
            $table->timestamps();
        });

         // Create time expression table
         Schema::create('time_expressions', function (Blueprint $table) {
            $table->id();
            $table->string('time_expression');
            $table->string('video_path');
            $table->timestamps();
        });

        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('food');
            $table->string('video_path');
            $table->timestamps();
        });


        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('animal');
            $table->string('video_path');
            $table->timestamps();
        });

        Schema::create('weathers', function (Blueprint $table) {
            $table->id();
            $table->string('weather');
            $table->string('video_path');
            $table->timestamps();
        });

        Schema::create('family_signs', function (Blueprint $table) {
            $table->id();
            $table->string('family_sign');
            $table->string('video_path');
            $table->timestamps();
        });

        Schema::create('money_matters', function (Blueprint $table) {
            $table->id();
            $table->string('money_matter');
            $table->string('video_path');
            $table->timestamps();
        });

        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('video_path');
            $table->timestamps();
        });

        Schema::create('transportations', function (Blueprint $table) {
            $table->id();
            $table->string('transportation');
            $table->string('video_path');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
        Schema::dropIfExists('numbers');
        Schema::dropIfExists('phrases');
        Schema::dropIfExists('time_expressions');
        Schema::dropIfExists('food');
        Schema::dropIfExists('animals');
        Schema::dropIfExists('weathers');
        Schema::dropIfExists('family_signs');
        Schema::dropIfExists('money_matters');
        Schema::dropIfExists('months');
        Schema::dropIfExists('transportations');
    }
};
