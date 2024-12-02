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
        Schema::create('certificate_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('position');
            $table->string('keperluan');
            $table->string('form_number')->nullable();
            $table->string('create_on')->nullable();
            $table->string('create_name')->nullable();
            $table->string('create_position')->nullable();
            $table->string('create_sign')->nullable();
            $table->string('create_stempel')->nullable();
            $table->string('review_position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_forms');
    }
};
