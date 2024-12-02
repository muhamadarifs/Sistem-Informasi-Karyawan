<?php

namespace App\Imports;

use App\Models\Payslip;
use App\Models\QrCodePayslips;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PayslipImport implements ToModel, WithEvents
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $user = User::where('nik', $row['1'])->first();
        $UserNik = $user ? $user->id : null;
        $qr = QrCodePayslips::where('periode', $row['2'])->first();
        $useQr = $qr ? $qr->id : null;
        return new Payslip([
            'user_id' => $UserNik,
            'qrpayslip_id' => $useQr,
            'periode' => $row['3'],
            'date_print' => $row['4'],
            'slip_no' => $row['5'],
            'group' => $row['6'],
            'work_day' => $row['7'],
            'absent' => $row['8'],
            'late' => $row['9'],
            'cuti' => $row['10'],
            'total_ot' => $row['11'],
            'basic_salary' =>  $row['12'],
            'allowence' =>  $row['13'],
            'correction' =>  $row['14'],
            'foreman_allow' =>  $row['15'],
            'overtime' =>  $row['16'],
            'shift_allow' =>  $row['17'],
            'addition_allow' =>  $row['18'],
            'bonus' =>  $row['19'],
            'thr' =>  $row['20'],
            'pay_absent' =>  $row['21'],
            'pay_late' =>  $row['22'],
            'pay_cuti' =>  $row['23'],
            'other_deduc' =>  $row['24'],
            'jht' =>  $row['25'],
            'bpjs_kesehatan' =>  $row['26'],
            'bpjs_tk' =>  $row['27'],
            'tax' =>  $row['28'],
            'total_income' =>  $row['29'],
            'total_deduc' =>  $row['30'],
            'take_pay' =>  $row['31'],
            'retro_gross' =>  $row['32'],
            'retro_deduct' =>  $row['33'],
            'empl_type' =>  $row['34'],
            'ot' =>  $row['35'],
        ]);
    }
    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function(BeforeImport $event) {
                $event->getReader()->getDelegate()->getActiveSheet()->removeRow(1);
            },
        ];
    }

}
