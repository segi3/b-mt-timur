<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use \stdClass;
use DataTables;

class UtilitasController extends Controller
{
    public function index() {
        $util = DB::table('konsumsi_energi')->whereDate('tanggal',  DB::raw('CURDATE()'))->first();

        if (!$util) {
            $util = new stdClass();
            $util->konsumsi_listrik = 0;
            $util->konsumsi_air = 0;
            $util->konsumsi_gas = 0;
        }

        return view('energy.index')->with('util', $util);
    }

    public function upsert(Request $request) {

        // dd($request);
        $util = DB::table('konsumsi_energi')->whereDate('tanggal',  DB::raw('CURDATE()'))->first();

        if($util){
            DB::table('konsumsi_energi')->whereDate('tanggal',  DB::raw('CURDATE()'))->update([
                'konsumsi_listrik' => $request->konsumsi_listrik,
                'konsumsi_air' =>$request->konsumsi_air,
                'konsumsi_gas' =>$request->konsumsi_gas,
            ]);

        } else {

            DB::table('konsumsi_energi')->insert([
                'konsumsi_listrik' => $request->konsumsi_listrik,
                'konsumsi_air' =>$request->konsumsi_air,
                'konsumsi_gas' =>$request->konsumsi_gas,
                'tanggal' => Carbon::now()->format('Y-m-d')
            ]);
        }

        return redirect('energy');
    }

    public function list(Request $request) {
        if ($request->ajax()) {
            $data = DB::table('konsumsi_energi')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
