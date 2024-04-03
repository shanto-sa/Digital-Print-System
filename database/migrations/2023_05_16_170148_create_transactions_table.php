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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id');
            $table->foreignId('mouza_id');
            $table->foreignId('new_mouza_id');
            $table->foreignId('dag_id');
            $table->string('map_type');
            $table->string('jalno');
            $table->string('dag_no');
            $table->string('sit_no');
            $table->string('email')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
