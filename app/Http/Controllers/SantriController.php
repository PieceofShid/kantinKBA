<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Exception;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::all();

        return view('santri.index', compact('santris'));
    }

    public function create()
    {
        return view('santri.tambah');
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'pin' => 'required|unique:santris',
            'saldo' => 'required'
        ]);

        try{
            Santri::create($data);

            return redirect()->route('santri.index')->with('success', 'Data berhasil ditambahkan');
        }catch(Exception $x){
            return redirect()->route('santri.index')->with('error', $x->getMessage());
        }
    }

    public function edit($id)
    {
        $santri = Santri::find($id);

        return view('santri.edit', compact('santri'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'pin' => 'required|unique:santris,pin,'.$id,
            'saldo' => 'required'
        ]);

        try{
            Santri::find($id)->update($data);

            return redirect()->route('santri.index')->with('success', 'Data berhasil diupdate');
        }catch(Exception $x){
            return redirect()->route('santri.index')->with('error', $x->getMessage());
        }
    }

    public function delete($id)
    {
        try{
            Santri::find($id)->delete();

            return redirect()->route('santri.index')->with('success', 'Data berhasil dihapus');
        }catch(Exception $x){
            return redirect()->route('santri.index')->with('error', $x->getMessage());
        }
    }
}
