<?php

namespace App\Imports;

use App\Models\Absensi;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;

class AttendanceImport implements ToModel, WithEvents
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::where('name', $row['2'])->first();
        $userId = $user ? $user->id : null;

        $tanggal = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['3'])->format('Y-m-d');

        $dataAbsen = [
            'employee_id' => $row['1'],
            'user_id' => $userId,
            'tanggal' => $tanggal,
            'jam_masuk' => $row['4'],
            'jam_keluar' => $row['5'],
            'total_wh' => $row['6'],
            'late' => $row['7'],
            'absent' => $row['8'],
            'ot' => $row['9'],
            'remarks' => $row['10'],
        ];

        $data = Absensi::updateOrCreate(
            ['employee_id' => $row['1'], 'tanggal' => $tanggal],
            $dataAbsen
        );

        return $data;
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
