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

        try{
            $topup = Topup::create($request->all());

            return $this->update($topup);
        }catch(Exception $x){
            return response()->json(['error'=> $x->getMessage()]);
        }
    }

    public function update($topup)
    {
        $santri = Santri::find($topup->santri_id);
        $saldo  = $santri->saldo + $topup->nominal;

        try{
            $santri->update([
                'saldo' => $saldo
            ]);

            return response()->json(['success'=> 'TOP UP BERHASIL SISA SALDO ANDA Rp. '.number_format($santri->saldo, 2, '.', '.')]);
        }catch(Exception $x){
            return response()->json(['error'=> $x->getMessage()]);
        }
    }
}
