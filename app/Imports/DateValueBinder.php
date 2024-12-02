<?php
namespace App\Imports;

use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class DateValueBinder extends DefaultValueBinder
{
    public function bindValue(Cell $cell, $value = null)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_NUMERIC);

            return true;
        }

        // Add your date format here
        $date = \DateTime::createFromFormat('d/m/Y', $value);
        if ($date) {
            $cell->setValueExplicit($date->format('Y-m-d'), DataType::TYPE_STRING);

            return true;
        }

        return parent::bindValue($cell, $value);
    }
}

