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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('file_ktp')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('name')->nullable();
            $table->string('position_name')->nullable();
            $table->string('position_id')->nullable();
            $table->string('division')->nullable();
            $table->string('section')->nullable();
            $table->string('unit')->nullable();
            $table->string('job_function')->nullable();
            $table->string('home_base')->nullable();
            $table->date('date_hire')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('umur')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('family_certificate_no')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->integer('anak')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('bpjs_filelinks')->nullable();
            $table->string('bpjs_tk')->nullable();
            $table->string('bpjstk_filelinks')->nullable();
            $table->string('basic')->nullable();
            $table->string('allowance')->nullable();
            $table->string('foreman')->nullable();
            $table->string('my_allow')->nullable();
            $table->string('other')->nullable();
            $table->string('email')->nullable();
            $table->string('group')->nullable();
            $table->string('education')->nullable();
            $table->string('ras')->nullable();
            $table->string('agama')->nullable();
            $table->string('size_baju')->nullable();
            $table->string('size_sepatu')->nullable();
            $table->date('contract_start')->nullable();
            $table->date('finish_contract')->nullable();
            $table->date('date_terminated')->nullable();
            $table->string('reason')->nullable();
            $table->string('status')->nullable();
            $table->string('password')->nullable();
            $table->string('spouse')->nullable();
            $table->string('spouse_gender')->nullable();
            $table->string('spouse_DOB')->nullable();
            $table->string('child1')->nullable();
            $table->string('child1_gender')->nullable();
            $table->string('child1_DOB')->nullable();
            $table->string('child2')->nullable();
            $table->string('child2_gender')->nullable();
            $table->string('child2_DOB')->nullable();
            $table->string('child3')->nullable();
            $table->string('child3_gender')->nullable();
            $table->string('child3_DOB')->nullable();
            $table->string('level')->nullable();
            $table->string('category')->nullable();
            $table->string('role')->nullable();
            $table->string('image')->default('user.png');
            $table->integer('saldo_cuti')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
