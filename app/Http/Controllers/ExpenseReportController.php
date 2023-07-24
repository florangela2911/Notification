<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReport;
use App\Mail\SummaryReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use mysqli;


class ExpenseReportController extends Controller
{
    
    public function index()
    {  
        return view('expenseReport.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required|min:3'
        ]);

        $report = new ExpenseReport();
        $report->title = $validData['title'];
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param ExpenseReport $expenseReport
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        return view('expenseReport.show', [
            'report' => $expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', [
            'report' => $report
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = ExpenseReport::find($id);
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();

        return redirect('/expense_reports');
    }

    public function confirmDelete($id) {
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmDelete', [
            'report' => $report
        ]);
    }

    public function confirmSendMail($id) {
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmSendMail', [
            'report' => $report
        ]);
    }

    public function sendMail(Request $request, $id) {
        $report = ExpenseReport::find($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));

        return redirect('/expense_reports/' . $id);
    }

    public function ExpenseReport ()
    {

            $mysqli = new mysqli('localhost', 'root', '', 'notificacion');
        if ($mysqli->connect_error) {
        die('Error connecting to database: ' . $mysqli->connect_error);
        }
        $sql = 'SELECT id, historia, fechacita, hora, nombre, procedim, sede, direccion, gmail FROM usuarios_gs';
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['id'] . ' ' . $row['historia'] . ' ' . $row['fechacita'] . $row['hora'] . ' ' . $row['nombre'] . ' ' . $row['procedim'] . ' ' . $row['sede'] . ' ' . $row['direccion'] . ' ' . $row['gmail'] .  '<br>';
        }
        }
        $mysqli->close();
    }
}

