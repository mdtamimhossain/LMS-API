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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('number');
            $table->string('password');
            $table->string('verification_code')->nullable();
            $table->boolean('email_verified')->default(false);
            $table->string('degree');
            $table->string('university');
            $table->string('photo');
            $table->string('userRole')->nullable();
            $table->boolean('isApproved')->default(false);
            $table->string('cv');
            $table->string('video_resume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
