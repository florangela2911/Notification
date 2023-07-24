<?php

namespace App\Http\Controllers;


use App\Mail\EmailReceived;
use App\Models\usuarios_gs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsuariosGsExport;
use App\Imports\DatosImport;



class NotificationController extends Controller
{
    /**
     * Summary of notification
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function notification ()
    {   
       $bases = usuarios_gs::all();
       return view('.Notification.notification')->with('bases', $bases);
    }

    public function mail ()
    {
        return view('mail.expenseReport');

    }

    public function importarDatos(Request $request)
{

    $request->validate([
        'Documento' => 'required|mimes:xls,xlsx'
    ]);
    dd($request);
    // Obtener los datos desde el archivo Excel
    $path = $request->file('Documento')->getRealPath();
    $datos = Excel::load($path, function($reader){
    })->get();

    // Seleccionar solo las columnas ... y gmail desde el array de datos
    $datosImportar = array_map(function ($dato) {
        return [
            'historia' => $dato['historia'],
            'fechacita' => $dato['fechacita'],
            'hora' => $dato['hora'],
            'nombre' => $dato['nombre'],
            'procedim' => $dato['procedim'],
            'sede' => $dato['sede'],
            'direccion' => $dato['direccion'],
            'gmail' => $dato['gmail']
        ];
    }, $datos->toArray());

    var_dump($datosImportar);

    // Insertar los datos en la base de datos
    usuarios_gs::insert($datosImportar);
    return back()->withStatus('Archivo Excel importado con éxito');

    
}
   public function exportar()
   {
       // Select specific columns from the usuarios_gs table
       $bases = usuarios_gs::select('id', 'historia', 'fechacita', 'hora', 'nombre', 'procedim', 'sede', 'direccion', 'gmail')->get();
   
       $fileName = 'usuarios_gs_export_' . now()->format('Y-m-d_H-i-s') . '.xls';
   
       $filePath = storage_path('app/public/' . $fileName);
    
   
       Excel::store(new UsuariosGsExport($bases), $fileName, 'public');

       return response()->download($filePath)->deleteFileAfterSend();
   }
   
}
