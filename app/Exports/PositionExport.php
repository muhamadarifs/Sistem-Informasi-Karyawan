<?php

namespace App\Exports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Maatwebsite\Excel\Facades\Excel;

class PositionExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Position::all();
    }

    public function map($position): array
    {
        return [
            $position->id,
            $position->position_code,
            $position->position_name,
            $position->superior_code,
            $position->superior_name,
            $position->department,
            $position->a,
            $position->dept_code,
        ];
    }

public function headings(): array
    {
        return [
            'No',
            'Position Code',
            'Position Name',
            'Superior Code',
            'Superior Name',
            'Department',
            'A',
            'Dept Code',
        ];
    }
public function styles(Worksheet $sheet)
    {
         // Mengatur ukuran kolom
         $sheet->getColumnDimension('A')->setWidth(8);
         $sheet->getColumnDimension('B')->setWidth(8);
         $sheet->getColumnDimension('C')->setWidth(8);
         $sheet->getColumnDimension('D')->setWidth(8);
         $sheet->getColumnDimension('E')->setWidth(8);
         $sheet->getColumnDimension('F')->setWidth(8);
         $sheet->getColumnDimension('G')->setWidth(8);
         $sheet->getColumnDimension('H')->setWidth(8);
         // ... tambahkan lebih banyak kolom sesuai kebutuhan

         // Mengatur orientasi landscape
         $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
         $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

         // Mengatur gaya judul (baris pertama)
         $sheet->getStyle('A1:H1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            'fill' => ['fillType' => 'solid', 'startcolor' => ['rgb' => 'FFFF00']],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);
         // Mengurangi margin halaman
        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setBottom(0.5);
        $sheet->getPageMargins()->setLeft(0.5);
        $sheet->getPageMargins()->setRight(0.5);
    }
}
