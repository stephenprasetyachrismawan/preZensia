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
        Schema::create('listrole', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('class', 'class_id');
            $table->foreignId('role_id')->constrained('roles', 'role_id');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listrole');
    }
};
