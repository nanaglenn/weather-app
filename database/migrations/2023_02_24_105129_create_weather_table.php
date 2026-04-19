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
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->decimal('lon', 7,4);
            $table->decimal('lat', 7,4);
            $table->bigInteger('city_id');
            $table->string('city', 30);
            $table->string('country', 3);
            $table->string('icon', 5);
            $table->string('main', 30);
            $table->string('description', 30);
            $table->decimal('temp', 3,1);
            $table->decimal('temp_min', 3,1);
            $table->decimal('temp_max', 3,1);
            $table->integer('pressure');
            $table->integer('humidity');
            $table->decimal('wind_speed', 5,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
