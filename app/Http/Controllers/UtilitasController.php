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

    public function rekap() {
        if(request()->ajax()) {
            return datatables()->of(DB::table('konsumsi_energi')->select(DB::raw('year(tanggal) as tahun, MONTH(tanggal) as bulan, sum(konsumsi_listrik) as sum_listrik, sum(konsumsi_air) as sum_air, sum(konsumsi_gas) as sum_gas'))->groupBy(DB::raw('MONTH(tanggal)')))
            // ->addColumn('action', 'maintenance.action')
            // ->rawColumns(['action'])
            // ->filter(function($instance) use ($request) {
            //     if (!empty($request->get('no_util'))) {
            //         $instance->where('no_util', 'like', '%' . $request->get('no_util') . '%');
            //     }
            //     if (!empty($request->get('search'))) {
            //         $instance->where(function($w) use($request){
            //            $search = $request->get('search');
            //            $w->orWhere('no_util', 'LIKE', "%$search%")
            //            ->orWhere('lokasi_utilitas', 'LIKE', "%$search%")
            //            ->orWhere('status_utilitas', 'LIKE', "%$search%")
            //            ->orWhere('keterangan', 'LIKE', "%$search%");
            //        });
            //    }
            // })
            ->addIndexColumn()
            ->make(true);
        }
        $energy = DB::table('konsumsi_energi')
            ->select(DB::raw('year(tanggal) as tahun, MONTH(tanggal) as bulan, sum(konsumsi_listrik) as sum_listrik, sum(konsumsi_air) as sum_air, sum(konsumsi_gas) as sum_gas'))
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->get();
        return view('energy.rekap', compact('energy'));
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
                'tanggal' => $request->tanggal
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
