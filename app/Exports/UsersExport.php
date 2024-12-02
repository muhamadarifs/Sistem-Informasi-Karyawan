<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Position;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Maatwebsite\Excel\Facades\Excel;


class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nomor Karyawan',
            'Nama Karyawan',
            'Position Code',
            'Posisi',
            'Report Code',
            'Report Name',
            'Dept Code',
            'Department',
            'Home Base',
            'Tanggal Rekrut',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Umur',
            'Gender',
            'Alamat',
            'No Telp',
            'Status Keluarga',
            'Anak',
            'Akun Bank',
            'NPWP',
            'BPJS Kesehatan',
            'BPJS Ketenagakerjaan',
            'Basic',
            'Allowance',
            'Foreman',
            'My Allow',
            'Lainnya',
            'Email',
            'Group',
            'Pendidikan',
            'Ras',
            'Agama',
            'Size Baju',
            'Size Sepatu',
            'Start Kontrak',
            'Finish Kontrak',
            'Tanggal diberhentikan',
            'Reason',
            'Status',
            'Nama Pasangan',
            'Gender Pasangan',
            'Tanggal Lahir Pasangan',
            'Anak 1',
            'Gender Anak 1',
            'Tanggal Lahir Anak 1',
            'Anak 2',
            'Gender Anak 2',
            'Tanggal Lahir Anak 2',
            'Anak 3',
            'Gender Anak 3',
            'Tanggal Lahir Anak 3',
            'Role',
            'Saldo Cuti',
        ];
    }

    public function map($user): array
    {
        static $number = 1;
        $positionCode = $user->position ? $user->position->position_code : null;
        $reportCode = $user->position ? $user->position->superior_code : null;
        $reportName = $user->position ? $user->position->superior_name : null;
        $deptCode = $user->position ? $user->position->dept_code : null;
        $deptName = $user->position ? $user->position->department : null;
        $formattedNik = sprintf('"%s"', $user->nik);
        return [
            $number++,
            $formattedNik,
            $user->employee_id,
            $user->name,
            $positionCode,
            $user->position_name,
            $reportCode,
            $reportName,
            $deptCode,
            $deptName,
            $user->home_base,
            $user->date_hire,
            $user->tempat_lahir,
            $user->tgl_lahir,
            $user->umur,
            $user->jenis_kelamin,
            $user->alamat,
            $user->telp,
            $user->status_keluarga,
            $user->anak,
            $user->bank_account,
            $user->npwp,
            $user->bpjs_kesehatan,
            $user->bpjs_tk,
            $user->basic,
            $user->allowance,
            $user->foreman,
            $user->my_allow,
            $user->other,
            $user->email,
            $user->group,
            $user->education,
            $user->ras,
            $user->agama,
            $user->size_baju,
            $user->size_sepatu,
            $user->contract_start,
            $user->finish_contract,
            $user->date_terminated,
            $user->reason,
            $user->status,
            $user->spouse,
            $user->spouse_gender,
            $user->spouse_DOB,
            $user->child1,
            $user->child1_gender,
            $user->child1_DOB,
            $user->child2,
            $user->child2_gender,
            $user->child2_DOB,
            $user->child3,
            $user->child3_gender,
            $user->child3_DOB,
            $user->role,
            $user->saldo_cuti,
        ];
    }
    public function exportPdf()
    {
        return Excel::download(new UsersExport, 'DataUsers.pdf', \Maatwebsite\Excel\Excel::DOMPDF, function($excel){
            $excel->sheet('Sheet1', function($sheet) {
                $sheet->getStyle('A1:I1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);
            });
        });
    }




}
