<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function collection()
    {
        // return Absensi::all();
        return Absensi::with('user')->get();
    }

    public function map($Attendance): array
    {
        static $number = 1;
        return[
            $number++,
            $Attendance->employee_id,
            $Attendance->user->name,
            $Attendance->tanggal,
            date('H:i', strtotime($Attendance->jam_masuk)),
            date('H:i', strtotime($Attendance->jam_keluar)),
            date('H:i', strtotime($Attendance->total_wh)),
            date('H:i', strtotime($Attendance->late)),
            date('H:i', strtotime($Attendance->absent)),
            date('H:i', strtotime($Attendance->ot)),
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nomor Karyawan',
            'Nama Karyawan',
            'Tanggal',
            'Jam Masuk',
            'Jam Keluar',
            'Total Work Hours',
            'Late',
            'Absent',
            'ot',
        ];
    }
}
