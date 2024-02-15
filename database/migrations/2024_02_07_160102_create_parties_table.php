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
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('court_case_id');
            $table->string('name');
            $table->string('address');
            $table->string('national_id');
            $table->string('military_id');
            $table->string('phone_number');
            $table->string('attorney');
            $table->string('party_type'); // plaintiff, defendant, witness
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
