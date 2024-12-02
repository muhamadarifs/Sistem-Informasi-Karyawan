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
        Schema::create('tes_payslips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('qrpayslip_id')->nullable();
            $table->foreign('qrpayslip_id')->references('id')->on('qrpayslip')->onDelete('cascade');
            $table->string('periode')->nullable();
            $table->string('date_print')->nullable();
            $table->integer('slip_no')->nullable();
            $table->string('group')->nullable();
            $table->integer('work_day')->nullable();
            $table->integer('absent')->nullable();
            $table->integer('late')->nullable();
            $table->integer('cuti')->nullable();
            $table->integer('total_ot')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('allowence')->nullable();
            $table->string('correction')->nullable();
            $table->string('foreman_allow')->nullable();
            $table->string('overtime')->nullable();
            $table->string('shift_allow')->nullable();
            $table->string('addition_allow')->nullable();
            $table->string('bonus')->nullable();
            $table->string('thr')->nullable();
            $table->string('pay_absent')->nullable();
            $table->string('pay_late')->nullable();
            $table->string('pay_cuti')->nullable();
            $table->string('other_deduc')->nullable();
            $table->string('jht')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('bpjs_tk')->nullable();
            $table->string('tax')->nullable();
            $table->string('total_income')->nullable();
            $table->string('total_deduc')->nullable();
            $table->string('take_pay')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_payslips');
    }
};
