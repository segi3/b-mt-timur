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
            ->addColumn('action', 'maintenance.action')
            ->rawColumns(['action'])
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

    public function edit(Maintenance $maintenance)
    {
        $user = DB::table('users')->where('role', 'teknisi')->get();
        // dd($user);
        return view('maintenance.edit',compact('maintenance', 'user'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'no_id_user' => ['required', 'string', 'max:255'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255'],
        //     'password' => ['sometimes', 'nullable', 'string', 'min:8'],
        //     'role' => ['required', 'string', 'max:255'],
        // ]);
        // dd($request->all());
        $mt = Maintenance::find($id);
        $mt->status_pekerjaan = $request->status_pekerjaan;
        $mt->nama_teknisi = $request->nama_teknisi;
        $mt->save();
        return redirect()->route('maintenance.index')
            ->with('success','Maintenance berhasil diupdate');
    }
}
