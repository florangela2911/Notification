<?php

namespace App\Imports;

use App\Mail\EmailReceived;
use App\Models\usuarios_gs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UsuariosGsImport implements ToModel, WithStartRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $exists = usuarios_gs::where('nro_hist',$row['0'])->first();
        if (!$exists) {
            $row[8] = Date::excelToDateTimeObject($row[8])->format('Y-m-d');
            $new_time = Carbon::createFromFormat('h:i A', $row[9]);
            $row[9] = $new_time->format('H:i:s');
            Mail::to($row[34])->send(new EmailReceived($row));
            return new usuarios_gs([
                'nro_hist' => $row[0],
                'historia' => $row[2],
                'fechacita'=> $row[8],
                'hora'     => $row[9],
                'nombre'   => $row[11],
                'procedim' => $row[15],
                'sede'     => $row[32],
                'direccion'=> $row[33],
                'gmail'    => $row[34]
            ]);
        }
        return null;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function uniqueBy()
    {
        return 'nro_hist';
    }
}
