<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Transaksi;
use Exception;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $santris = Santri::all();

        return view('transaksi.tambah', compact('santris'));
    }

    public function post(Request $request)
    {
        if($request->santri_id == 0){
            return $this->update($request);
        }

        try{
            $santri = Santri::find($request->santri_id);
            $saldo  = $santri->saldo - $request->nominal;
            $santri->update([
                'saldo' => $saldo
            ]);
            
            return $this->update($request);
        }catch(Exception $x){
            return response()->json(['error'=> $x->getMessage()]);
        }
    }

    public function update($request)
    {
        if($request->santri_id == 0){
            $nama = 'Non-Santri';
            $msg = 'TRANSAKSI BERHASIL';
        }else{
            $santri = Santri::find($request->santri_id);
            $nama = $santri->nama;
            $msg = 'TRANSAKSI BERHASIL SISA SALDO ANDA Rp. '.number_format($santri->saldo, 0, '.', '.');
        }

        try{
            $transaksi = Transaksi::create([
                'nama' => $nama,
                'nominal' => $request->nominal,
                'deskripsi' => $request->deskripsi
            ]);

            return response()->json(['success'=> $msg]);
        }catch(Exception $x){
            return response()->json(['error'=> $x->getMessage()]);
        }
    }

    public function check($id)
    {
        $santri = Santri::find($id);

        return $santri;
    }
}
