<?php

namespace App\Imports;

use App\Models\Dat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DatosImport implements ToModel, WithHeadingRow,  WithBatchInserts,  WithChunkReading
{
    /**
    * @param array $row
    */
    public function model(array $row)
    {
     return new Dat([
        'historia'=>$row['historia'],
        'fechacita'=>$row['fechacita'],
        'hora'=>$row['hora'],
        'nombre'=>$row['nombre'],
        'procedim'=>$row['procedim'],
        'sede'=>$row['sede'],
        'direccion'=>$row['direccion'],
        'gmail'=>$row['gmail'],
     ]);  
    }
    public function batchSize(): int
    {
        return 7000;
    }
    public function chunkSize(): int
    {
        return 7000;
    }
}
