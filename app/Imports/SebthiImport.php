<?php

namespace App\Imports;

use App\Models\ReporteSebthi;
use Maatwebsite\Excel\Concerns\ToModel;

class SebthiImport implements ToModel
{
    public function model(array $row)
    {
        return new ReporteSebthi([
            'columna1' => $row[0],  // Ajusta según la estructura de tu archivo
            'columna2' => $row[1],
            'columna3' => $row[2],
        ]);
    }
}
