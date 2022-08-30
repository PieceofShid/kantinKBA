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

        try{
            $transaksi = Transaksi::create($request->all());

            return $this->update($transaksi);
        }catch(Exception $x){
            return response()->json(['error'=> $x->getMessage()]);
        }
    }

    public function update($transaksi)
    {
        $santri = Santri::find($transaksi->santri_id);
        $saldo  = $santri->saldo - $transaksi->nominal;

        try{
            $santri->update([
                'saldo' => $saldo
            ]);

            return response()->json(['success'=> 'TRANSAKSI BERHASIL SISA SALDO ANDA Rp. '.number_format($santri->saldo, 2)]);
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
