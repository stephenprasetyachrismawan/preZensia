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
        Schema::create('listpresensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presensi_id')->constrained('presensi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ket_id')->constrained('ket')->onDelete('cascade')->onUpdate('cascade');
            $table->string('murid');
            $table->dateTime('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listpresensi');
    }
};
