<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MaintenanceController extends Controller
{
    public function index(Request $request)
        {
        if(request()->ajax()) {
            return datatables()->of(DB::table('maintenance')->select('*'))
            // ->addColumn('action', 'maintenance.action')
            // ->rawColumns(['action'])
            ->filter(function($instance) use ($request) {
                if (!empty($request->get('bulan'))) {
                    $instance->whereRaw('MONTH(jadwal_maintenance) = '. $request->get('bulan'));
                }
                if (!empty($request->get('search'))) {
                    $instance->where(function($w) use($request){
                       $search = $request->get('search');
                       $w->orWhere('no_util', 'LIKE', "%$search%")
                       ->orWhere('lokasi_utilitas', 'LIKE', "%$search%")
                       ->orWhere('status_utilitas', 'LIKE', "%$search%")
                       ->orWhere('keterangan', 'LIKE', "%$search%");
                   });
               }
            })
            ->addIndexColumn()
            ->make(true);
        }
        return view('maintenance.index');
    }
}
