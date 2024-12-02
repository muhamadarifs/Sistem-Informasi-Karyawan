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
        Schema::create('position', function (Blueprint $table) {
            $table->id();
            $table->string('position_code')->nullable();
            $table->string('position_name')->nullable();
            $table->string('superior_code')->nullable();
            $table->string('superior_name')->nullable();
            $table->string('department')->nullable();
            $table->string('a')->nullable();
            $table->string('dept_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position');
    }
};
