<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Hash;

class UserCRUDController extends Controller
{
    public function index()
        {
        if(request()->ajax()) {
            return datatables()->of(User::select('*'))
            ->addColumn('action', 'user.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('user.index');
    }

    public function create()
    {
         return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_id_user' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'max:255'],
        ]);
        User::create([
            'no_id_user' => $request->no_id_user,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->route('users.index')
            ->with('success','User baru berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_id_user' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8'],
            'role' => ['required', 'string', 'max:255'],
        ]);
        // dd($request->all());
        $user = User::find($id);
        $user->no_id_user = $request->no_id_user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password == null ? $user->password : $request->password;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('users.index')
            ->with('success','user berhasil diupdate');
    }

    public function destroy(Request $request)
    {
        $com = User::where('id',$request->id)->delete();
        return Response()->json($com);
    }
}
