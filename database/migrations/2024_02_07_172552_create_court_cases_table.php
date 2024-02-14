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
        Schema::create('court_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_number');
            $table->string('title');
            $table->string('case_type');
            $table->string('case_status');
            $table->text('cause_of_action');
            $table->text('case_details');
            $table->foreignId('court_id');
            $table->foreignId('lawyer_id')
                ->references('id')
                ->on('users');
            $table->foreignId('clerk_id')
                ->references('id')
                ->on('users');
            $table->string('start_date');
            $table->string('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('court_cases');
    }
};
