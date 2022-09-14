<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Topup;
use Exception;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        $topups = Topup::all();

        return view('topup.index', compact('topups'));
    }

    public function create()
    {
        $santris = Santri::all();

        return view('topup.tambah', compact('santris'));
    }

    public function post(Request $request)
    {
        $santri = Santri::find($request->santri_id);
        $saldo  = $santri->saldo + $request->nominal;

        try{
            $santri->update([
                'saldo' => $saldo
            ]);

            return $this->update($request);
        }catch(Exception $x){
            return response()->json(['success'=> $x->getMessage()]);
        }
    }

    public function update($request)
    {
        $santri = Santri::find($request->santri_id);

        try{
            Topup::create([
                'nama' => $santri->nama,
                'nominal' => $request->nominal
            ]);

            return response()->json(['success'=> 'TOP UP BERHASIL SISA SALDO ANDA Rp. '.number_format($santri->saldo, 2, '.', '.')]);
        }catch(Exception $x){
            return response()->json(['success'=> $x->getMessage()]);
        }
    }
}
