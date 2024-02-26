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
            $table->string('case_status')->nullable();
            $table->text('cause_of_action');
            $table->text('case_details');
            $table->text('decision')->nullable();
            $table->foreignId('court_id')->nullable();
            $table->foreignId('lawyer_id')
                ->references('id')
                ->on('users');
            $table->foreignId('clerk_id')
                ->references('id')
                ->on('users');
            $table->string('start_date');
            $table->string('app_date')->nullable();
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
