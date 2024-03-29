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
        Schema::create('retains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('court_case_id');
            $table->foreignId('lawyer_id')
                ->references('id')
                ->on('users');
            $table->foreignId('client_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retains');
    }
};
