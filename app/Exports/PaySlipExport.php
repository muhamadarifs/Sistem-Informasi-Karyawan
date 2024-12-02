<?php

namespace App\Exports;

use App\Models\Payslip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Collection;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PaySlipExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function collection()
    {
        return Payslip::with('user')->get();
    }

    public function map($payslip): array
    {
        // dd($payslip);
        static $number = 1;
        $formattedNik = sprintf('"%s"', $payslip->user->nik);
        return[
            $number++,
            $payslip->user_id,
            $formattedNik,
            $payslip->user->employee_id,
            $payslip->user->name,
            $payslip->user->position->position_name,
            $payslip->user->position->department,
            $payslip->periode,
            $payslip->date_print,
            $payslip->slip_no,
            $payslip->group,
            $payslip->work_day,
            $payslip->absent != 0 ? $payslip->absent : '0',
            $payslip->late != 0 ? $payslip->late : '0',
            $payslip->cuti != 0 ? $payslip->cuti : '0',
            $payslip->total_ot != 0 ? $payslip->total_ot : '0',
            $payslip->basic_salary,
            $payslip->allowence,
            $payslip->correction,
            $payslip->foreman_allow,
            $payslip->overtime,
            $payslip->shift_allow,
            $payslip->addition_allow,
            $payslip->bonus,
            $payslip->thr,
            $payslip->pay_absent,
            $payslip->pay_late,
            $payslip->pay_cuti,
            $payslip->other_deduc,
            $payslip->jht,
            $payslip->bpjs_kesehatan,
            $payslip->bpjs_tk,
            $payslip->tax,
            $payslip->total_income,
            $payslip->total_deduc,
            $payslip->take_pay,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'User Id',
            'NIK',
            'No Karwayan',
            'Nama Karyawan',
            'Position Name',
            'Departement',
            'Periode',
            'Date Print Out',
            'Slip No',
            'Group',
            'Working Day',
            'Absent (Days)',
            'Late (Hours)',
            'Annual Leave/MC/Other',
            'Total Overtime Hours',
            'Basic Salary',
            'Allowance',
            'Correction',
            'Foreman Allowance',
            'Overtime',
            'Shift Allowance',
            'Additional Allowance',
            'Bonus',
            'THR',
            'Absent',
            'Late',
            'Annual Leave/MC',
            'Other Deduct',
            'JHT',
            'BPJS Health Care',
            'BPJS Pension',
            'Tax',
            'Total Income',
            'Total Deduction',
            'Take Home Pay',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            'A1:AF1' => [
                'font' => [
                    'bold' => true,
                    'name' => 'Times New Roman', 
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFF00'],
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
            'A2:AF1048' => [ 
                'font' => [
                    'bold' => false, 
                    'name' => 'Times New Roman', 
                ],
                // 'alignment' => [
                //     'horizontal' => 'center',
                //     'vertical' => 'center',
                // ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }

}
