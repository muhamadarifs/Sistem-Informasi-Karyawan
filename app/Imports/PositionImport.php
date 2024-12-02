<?php

namespace App\Imports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;

class PositionImport implements ToModel, WithEvents
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Position([
            'position_code' => $row['1'],
            'position_name' => $row['2'],
            'superior_code' => $row['3'],
            'superior_name' => $row['4'],
            'department' => $row['5'],
            'a' => $row['6'],
            'dept_code' => $row['7'],
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
