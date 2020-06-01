<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Auth;

class pasarController extends Controller
{
    public function show(){
        $dataProduk = DB::table('produk')->get();

        $id = Auth::id();
        $userID = DB::table('users')->where('id', '=', $id)->value('name');

        $daftarBelanja = DB::table('keranjang')->where('idUser', '=', $id)->get();

        $jumlahBelanja = count($daftarBelanja);

        return view('user.home', ['dataProduk' => $dataProduk, 'jumlahBelanja' => $jumlahBelanja]);
    }

    public function daftarBelanja($id){
        $daftarBelanja = DB::table('keranjang')->where('idBarang', '=', $id)->get();

        $check = count($daftarBelanja);

        $kuantitas = DB::table('produk')->where('id', '=', $id)->value('kuantitas_produk');

        if($check>0){
            return redirect()->back()->with('error',  'Gagal, pilihan anda sudah ada di keranjang!');
        }else{
            
            if($kuantitas <= 0){
                return redirect()->back()->with('error',  'Gagal, Maaf stocknya sudah habis');
            }else{
                $idUser = Auth::id();
                
                DB::table('keranjang')->insert(
                    ['idUser' => $idUser, 'idBarang' => $id]
                ); 

                $kurangiKuantitas = $kuantitas - 1;
                
                DB::table('produk')->where('id', $id)->update(['kuantitas_produk' => $kurangiKuantitas]);

                return redirect()->back()->with('success',  'Berhasil, pilihan anda ditambahkan ke keranjang!');
            }
        }
    }


}
