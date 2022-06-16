<?php

namespace App\Http\Controllers;

use App\Models\Utilitas;
use Illuminate\Http\Request;
use Datatables;

class UtilitasCRUDController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax()) {
            return datatables()->of(Utilitas::select('*'))
            ->addColumn('action', 'utilitas.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->filter(function($instance) use ($request) {
                if (!empty($request->get('jenis_utilitas'))) {
                    $instance->where('jenis_utilitas', $request->get('jenis_utilitas'));
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
            ->make(true);
        }
        return view('utilitas.index');
    }

    public function edit(Utilitas $utilita)
    {
        return view('utilitas.edit',compact('utilita'));
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

        $util = Utilitas::find($id);
        $util->no_util = $request->no_util;
        $util->jenis_utilitas = $request->jenis_utilitas;
        $util->lokasi_utilitas = $request->lokasi_utilitas;
        $util->status_utilitas = $request->status_utilitas;
        $util->keterangan = $request->keterangan;
        $util->tanggal = $request->tanggal;
        $util->bidang_utilitas = $request->bidang_utilitas;
        $util->save();

        return redirect()->route('utilitas.index')
            ->with('success','Utilitas berhasil diupdate');
    }
}
