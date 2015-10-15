<?php namespace App\Http\Controllers;
use App\Models\Attendance; //including model.
use App\Http\Controllers\Controller;
class LaporanController extends Controller {
    public function attendance() {
        // Getting all records from model associates table.
//        $data = Attendance::all();
//        $data = Attendance::first();
        $data = Attendance::paginate(15);

        // Returning data on view.
        return view('laporan.attendance', ['data' => $data]);
    }
}
