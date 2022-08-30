<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('user.tambah', compact('roles'));
    }

    public function post(Request $request)
    {
        try{
            User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'role_id' => $request->role,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan');
        }catch(Exception $x){
            return redirect()->route('user.index')->with('error', $x->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        if($request->password != ''){
            $data = array_replace($request->all(), array('password' => Hash::make($request->password)));
        }else{
            $data = $request->except('password');
        }

        try{
            User::find($id)->update($data);

            return redirect()->route('user.index')->with('success', 'Data berhasil diupdate');
        }catch(Exception $x){
            return redirect()->route('user.index')->with('error', $x->getMessage());
        }
    }

    public function delete($id)
    {
        try{
            User::find($id)->delete();

            return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
        }catch(Exception $x){
            return redirect()->route('user.index')->with('error', $x->getMessage());
        }
    }
}
