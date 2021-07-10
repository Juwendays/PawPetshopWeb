<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Produk;


class TransaksiController extends Controller
{
    public function index(){
        $transaksiPading['listPading'] = Transaksi::whereStatus('MENUNGGU')->get();
        $transaksiSelesai['listDone'] = Transaksi::where('Status', 'NOT LIKE', '%MENUNGGU%')->get();

        //listPanding dan listDone dipakai sebagai arraylist yang nantinya di jadikan as

        return view('transaksi')->with($transaksiPading)->with($transaksiSelesai);
    }

    public function batal($id){
        $transaksi = Transaksi::where('id', $id)->first();
        
        $transaksi->update([
            'status' => "BATAL"
        ]);

        return redirect('transaksi');
    }

    public function confirm($id){
        $transaksi = Transaksi::where('id', $id)->first();
        
        $transaksi->update([
            'status' => "PROSES"
        ]);

        return redirect('transaksi');
    }

    public function kirim($id){
        $transaksi = Transaksi::where('id', $id)->first();
        
        $transaksi->update([
            'status' => "DIKIRIM"
        ]);

        return redirect('transaksi');
    }

    public function selesai($id){
        $transaksi = Transaksi::where('id', $id)->first();
        
        $transaksi->update([
            'status' => "SELESAI"
        ]);

        return redirect('transaksi');
    }
}
