<?php

namespace App\Http\Controllers;


use App\Mail\EmailReceived;
use App\Models\usuarios_gs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsuariosGsExport;
use App\Imports\UsuariosGsImport;



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
        'documento' => 'required|mimes:xls,xlsx'
    ]);

    $path = $request->file('documento')->getRealPath();
    Excel::import(new UsuariosGsImport, $path);
    return redirect('/Notification')->with('success', 'Archivo Excel importado con éxito!');

}
   public function exportar()
   {
       // Select specific columns from the usuarios_gs table
       $bases = usuarios_gs::select('id', 'nro_hist', 'historia', 'fechacita', 'hora', 'nombre', 'procedim', 'sede', 'direccion', 'gmail')->get();

       $fileName = 'usuarios_gs_export_' . now()->format('Y-m-d_H-i-s') . '.xls';

       $filePath = storage_path('app/public/' . $fileName);


       Excel::store(new UsuariosGsExport($bases), $fileName, 'public');

       return response()->download($filePath)->deleteFileAfterSend();
   }

}
