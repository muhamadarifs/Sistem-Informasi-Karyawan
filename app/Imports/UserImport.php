<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Position;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Concerns\WithEvents;

class UserImport implements ToModel, WithEvents
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;

    public static $importedEmails = [];
    public function model(array $row)
    {
        $user = User::where('nik', $row['1'])->first();
        $position = Position::where('position_code', $row['5'])->first();
        $positionId = $position ? $position->id : null;

        $userData = [
                'nik' => $row['1'],
                'employee_id' => $row['2'],
                'name' => $row['3'],
                'position_name' => $row['4'],
                'position_id' => $positionId,
                'division' => $row['6'],
                'section' => $row['7'],
                'unit' => $row['8'],
                'home_base' => $row['9'],
                'date_hire' => !empty($row['10']) && is_numeric($row['10']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['10'])->format('Y-m-d') : null,
                'tempat_lahir' => $row['11'],
                'tgl_lahir' => !empty($row['12']) && is_numeric($row['12']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['12'])->format('Y-m-d') : null,
                'umur' => intval($row['13']),
                'jenis_kelamin' => $row['14'],
                'alamat' => $row['15'],
                'telp' => $row['16'],
                'status_keluarga' => $row['17'],
                'anak' => intval($row['18']),
                'bank_account' => $row['19'],
                'npwp' => $row['20'],
                'bpjs_kesehatan' => $row['21'],
                'bpjs_tk' => $row['22'],
                'basic' => $row['23'],
                'allowance' => $row['24'],
                'foreman' => $row['25'],
                'my_allow' => $row['26'],
                'other' => $row['27'],
                'email' => $row['28'],
                'group' => $row['29'],
                'education' => $row['30'],
                'ras' => $row['31'],
                'agama' => $row['32'],
                'size_baju' => $row['33'],
                'size_sepatu' => $row['34'],
                'contract_start' => !empty($row['35']) && is_numeric($row['35']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['35'])->format('Y-m-d') : null,
                'finish_contract' => !empty($row['36']) && is_numeric($row['36']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['36'])->format('Y-m-d') : null,
                'date_terminated' => !empty($row['37']) && is_numeric($row['37']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['37'])->format('Y-m-d') : null,
                'reason' => $row['38'],
                'status' => $row['39'],
                'spouse' => $row['40'],
                'spouse_gender' => $row['41'],
                'spouse_DOB' => !empty($row['42']) && is_numeric($row['42']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['42'])->format('Y-m-d') : null,
                'child1' => $row['43'],
                'child1_gender' => $row['44'],
                'child1_DOB' => !empty($row['45']) && is_numeric($row['45']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['45'])->format('Y-m-d') : null,
                'child2' => $row['46'],
                'child2_gender' => $row['47'],
                'child2_DOB' => !empty($row['48']) && is_numeric($row['48']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['48'])->format('Y-m-d') : null,
                'child3' => $row['49'],
                'child3_gender' => $row['50'],
                'child3_DOB' => !empty($row['51']) && is_numeric($row['51']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['51'])->format('Y-m-d') : null,
                'level' => $row['52'],
                'role' => $row['53'],
                'saldo_cuti' => intval($row['54']),
                'image' => $row['55'],
                'emergency_contact' => $row['56'],
        ];

        if ($user) {
            $user->update($userData);
        } else {
            $user = User::create($userData);
        }

        self::$importedEmails[] = $row[28];

        return $user;
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
