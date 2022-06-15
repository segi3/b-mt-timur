<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KomplainCRUDController extends Controller
{
    public function index()
        {
        if(request()->ajax()) {
            return datatables()->of(Komplain::select('*'))
            ->addColumn('action', 'komplain.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('komplain.index');
    }

    public function create()
    {
        $user = DB::table('users')->where('role', 'teknisi')->get();
        // dd($user);

        return view('komplain.create', compact('user'));
    }

    public function create_guest() {
        $user = DB::table('users')->where('role', 'teknisi')->get();
        // dd($user);

        return view('komplain.create-guest', compact('user'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'no_id_user' => ['required', 'string', 'max:255'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8'],
        //     'role' => ['required', 'string', 'max:255'],
        // ]);
        Komplain::create([
            'tgl_penyampaian' =>  Carbon::now(),
            'bidang_pekerjaan' => $request->bidang_pekerjaan,
            'uraian_pekerjaan' => $request->uraian_pekerjaan,
            'status_pekerjaan' => 'Waiting',
            'nama_pelapor' => $request->nama_pelapor,
            'user_id' => null,
            'nama_teknisi' => $request->nama_teknisi
        ]);
        return redirect()->route('komplain.index')
            ->with('success','Komplain baru berhasil Dibuat.');
    }

    public function show(Komplain $komplain)
    {
        return view('komplain.show',compact('komplain'));
    }

    public function edit(Komplain $komplain)
    {
        $user = DB::table('users')->where('role', 'teknisi')->get();
        // dd($user);
        return view('komplain.edit',compact('komplain', 'user'));
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
        $komplain = Komplain::find($id);
        $komplain->status_pekerjaan = $request->status_pekerjaan;
        // $komplain->user_id = $request->user_id;
        $komplain->nama_teknisi = $request->nama_teknisi;
        $komplain->save();
        return redirect()->route('komplain.index')
            ->with('success','Komplain berhasil diupdate');
    }

    public function destroy(Request $request)
    {
        $com = Komplain::where('id',$request->id)->delete();
        return Response()->json($com);
    }
}
