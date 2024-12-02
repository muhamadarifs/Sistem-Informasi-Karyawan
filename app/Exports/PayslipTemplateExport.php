<?php

namespace App\Exports;
use App\Models\Payslip;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PayslipTemplateExport implements  WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'QR Period',
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
                // 'borders' => [
                //     'allBorders' => [
                //         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                //         'color' => ['argb' => '000000'],
                //     ],
                // ],
            ],
            // 'A2:AF1048' => [
            //     'font' => [
            //         'bold' => false,
            //         'name' => 'Times New Roman',
            //     ],
            //     'borders' => [
            //         'allBorders' => [
            //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            //             'color' => ['argb' => '000000'],
            //         ],
            //     ],
            // ],
        ];
    }
}
