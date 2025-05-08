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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brgy_id')->constrained('brgys')->cascadeOnDelete();
            $table->string('number');
            $table->string('email')->unique()->nullable();
            $table->string('case_type');
            $table->string('coronavirus_status');
            $table->timestamps();

            $table->index('brgy_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
