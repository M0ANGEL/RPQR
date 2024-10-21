<?php

namespace App\Imports;

use App\Models\ReporteServinte;
use Maatwebsite\Excel\Concerns\ToModel;

class ServinteImport implements ToModel
{
    public function model(array $row)
    {
        return new ReporteServinte([
            'columna1' => $row[0],  // Ajusta según la estructura de tu archivo
            'columna2' => $row[1],
            'columna3' => $row[2],
        ]);
    }
}
