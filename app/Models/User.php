<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\NewResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'nik',
        'file_ktp',
        'employee_id',
        'name',
        'position_name',
        'position_id',
        'division',
        'section',
        'unit',
        'job_function',
        'home_base',
        'date_hire',
        'tempat_lahir',
        'tgl_lahir',
        'umur',
        'jenis_kelamin',
        'alamat',
        'telp',
        'mother_name',
        'emergency_contact',
        'family_certificate_no',
        'status_keluarga',
        'anak',
        'bank_account',
        'npwp',
        'bpjs_kesehatan',
        'bpjs_filelinks',
        'bpjs_tk',
        'bpjstk_filelinks',
        'basic',
        'allowance',
        'foreman',
        'my_allow',
        'other',
        'email',
        'group',
        'education',
        'ras',
        'agama',
        'size_baju',
        'size_sepatu',
        'contract_start',
        'finish_contract',
        'date_terminated',
        'reason',
        'status',
        'password',
        'spouse',
        'spouse_gender',
        'spouse_DOB',
        'child1',
        'child1_gender',
        'child1_DOB',
        'child2',
        'child2_gender',
        'child2_DOB',
        'child3',
        'child3_gender',
        'child3_DOB',
        'level',
        'category',
        'role',
        'image',
        'saldo_cuti',
        'email_verified_at',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'superior_name', 'position_name');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'superior_name', 'position_name');
    }
    // mendefinisikan hubungan dengan bawahan
    public function subordinates()
    {
        return $this->hasMany(User::class, 'superior_name', 'position_name');
    }

    public function leavebalance()
    {
        return $this->hasMany(LeaveBalance::class);
    }

    public function payslip()
    {
        return $this->hasMany(Payslip::class, 'user_id', 'id');
    }
    public function tes_payslips()
    {
        return $this->hasMany(TesPayslip::class, 'user_id', 'id');
    }

    public function annualleaves()
    {
        return $this->hasMany(AnnualLeave::class);
    }
    public function medicalleaves()
    {
        return $this->hasMany(MedicalLeave::class);
    }
    public function specialleaves()
    {
        return $this->hasMany(SpecialLeave::class);
    }
    public function permits()
    {
        return $this->hasMany(Permit::class);
    }
    public function datachanges()
    {
        return $this->hasMany(DataChange::class);
    }
    public function certificateforms()
    {
        return $this->hasMany(CertificateForm::class);
    }

    public function historikal()
    {
        return $this->hasMany(EmployeeHistory::class);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function sign()
    {
        return $this->hasMany(Sign::class);
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'nik'=> 'string',
    ];

    public function getFirstName(){
        $user = Auth::user();
        $fullName = $user->name;

        $firstName = explode(' ', $fullName)[0];
        return $firstName;
    }
}
