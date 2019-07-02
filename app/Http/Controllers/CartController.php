<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Pesanan_barang;
use DB;
use Webpatser\Uuid\Uuid;
use App\pembayaran;
use App\kota;
use App\layanan;

use Cart;

class CartController extends Controller
{
    public function index()
    {
        $title = 'Keranjang Belanja';
        $barang = Cart::content();

        return view('toko.keranjang',['barang'=>$barang]);
    }

    public function destroy()
    {
        Cart::destroy();
        
        Session::flash('pesan','Barang telah di hapus');
         return redirect ('toko.keranjang');
    }

    public function update($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId,['qty'=>$item->qty + 1]);

        return redirect()->back();
    }

    public function kurangi($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId,['qty'=>$item->qty - 1]);

        return redirect()->back();
    }

    public function check_out()
    {
       
        $kota = kota::get();
        return view('toko.check-out', compact('kota'));
    }

    public function pembayaran()
    {
        $keranjang = Cart::content();
        $bank = pembayaran::get();
        return view('toko.ongkoskirim');
    }

    public function bayar(Request $request)
    {
        $id_users = Auth::user()->id_users;
        $uid = Uuid::generate(4);
        $nama_penerima = $request->nama;
        $alamat = $request->alamat;
        $nama_rek = $request->nama_rek;
        $bank = $request->bank;
        $tujuan = $request->tujuan;
        $no = $request->no_hp;
        $cost = $request->cost;
        $ongkir = $request->ongkir;
        $waktu = $request->waktu;

        $keranjang = Cart::content();
        foreach ($keranjang as $cart){
            $barang = $cart->name;
            $jumlah = $cart->qty;
            $bayar = $cart->total;
        }
            
        //dd($id);
        $biaya_ongkir = $bayar + $ongkir;
        $pesanan = DB::table('pesanan')->select('id')->get();
        
        
        $pesanan = new Pesanan;
        $pesanan->id = $uid;
        $pesanan->id_users = $id_users;
        $pesanan->nama_penerima = $nama_penerima;
        $pesanan->alamat = $alamat;
        $pesanan->telepon = $no;
        $pesanan->total_bayar = $biaya_ongkir;
        $pesanan->nama_rek = $nama_rek;
        $pesanan->id_bank = $bank;
        $pesanan->save();

        
        foreach ($keranjang as $cart) {
            $pesan_barang = new pesanan_barang;
            $pesan_barang->pesanan_id = $uid;
            $pesan_barang->id_users = $id_users;
            $pesan_barang->id_barang = $cart->id;
            $pesan_barang->qty = $cart->qty;
            $pesan_barang->subtotal = $cart->subtotal;
            $pesan_barang->save();

            

        }
        $layanan = new layanan;
        $layanan->pesanan_id = $uid;
        $layanan->paket = $cost;
        $layanan->ongkos = $ongkir;
        $layanan->hari = $waktu;
        $layanan->save();
        
        return view('toko.showpembyaran',compact('nama_penerima','alamat','cost','keranjang','ongkir', 'jumlah', 'biaya_ongkir'));
    }

    public function kembali()
    {
        Cart::destroy();

        return redirect('/');
    }
}
