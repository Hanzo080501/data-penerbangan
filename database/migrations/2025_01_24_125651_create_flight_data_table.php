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
        Schema::create('flight_data', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number');
            $table->string('registration');
            $table->string('flight_hours');
            $table->integer('flight_cycles');
            $table->string('time_since_new');
            $table->integer('cycle_since_new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_data');
    }
};
