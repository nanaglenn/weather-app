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
    $table->decimal('lon', 10, 6);
    $table->decimal('lat', 10, 6);
    $table->unsignedBigInteger('city_id');
    $table->string('city');
    $table->string('country', 10);
    $table->string('icon', 20);
    $table->string('main', 50);
    $table->string('description', 100);
    $table->decimal('temp', 5, 2);
    $table->decimal('temp_min', 5, 2);
    $table->decimal('temp_max', 5, 2);
    $table->integer('pressure');
    $table->integer('humidity');
    $table->decimal('wind_speed', 5, 2);
    $table->timestamp('created_at');
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
