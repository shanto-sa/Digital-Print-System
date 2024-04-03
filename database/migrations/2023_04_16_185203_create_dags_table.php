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
        Schema::create('dags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id');
            $table->foreignId('mouza_id');
            $table->foreignId('new_mouza_id');
            $table->string('map_type');
            $table->string('jalno');
            $table->string('dag_no')->nullable();
            $table->string('map_image');
            $table->string('sit_no')->nullable();
            $table->boolean('status')->default(false);
            $table->bigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dags');
    }
};
