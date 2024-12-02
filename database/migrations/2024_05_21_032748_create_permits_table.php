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
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('department')->nullable();
            $table->string('position_name')->nullable();
            $table->string('position_code')->nullable();
            $table->string('superior_name')->nullable();
            $table->string('superior_code')->nullable();
            $table->string('permit')->nullable();
            $table->string('jumlah_hari')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->date('backoffice_date')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('ket_lambat')->nullable();
            $table->date('tanggal_datang_lambat')->nullable();
            $table->time('jam_datang_lambat')->nullable();
            $table->string('ket_cepat')->nullable();
            $table->date('tanggal_pulang_cepat')->nullable();
            $table->time('jam_pulang_cepat')->nullable();
            $table->string('telp')->nullable();
            $table->string('status')->default('waiting');
            $table->string('request_sign')->nullable();
            $table->string('approve1_name')->nullable();
            $table->string('hod_approver_1')->nullable();
            $table->string('approve1_sign')->nullable();
            $table->string('approve2_name')->nullable();
            $table->string('approve2_sign')->nullable();
            $table->string('approve3_name')->nullable();
            $table->string('approve3_sign')->nullable();
            $table->string('review_name')->nullable();
            $table->string('review_sign')->nullable();
            $table->timestamp('approval1_date')->nullable();
            $table->timestamp('approval2_date')->nullable();
            $table->timestamp('approval3_date')->nullable();
            $table->timestamp('review_date')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permits');
    }
};
