<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use DB;
use App\Models\Barang;
use App\Models\beli_lsg;
use Cart;
use Auth;
use Session;
use Illuminate\Http\Request;

class LayarDpnController extends Controller
{
    public function index()
    {
        $barang = Barang::orderBy('id_barang','desc')->get();

        return view('Toko.tokodepan', compact('barang'));
    }

    public function addto_Cart(Request $request, $id)
    {
        $barang = Barang::find($id);
        
            Cart::add(['id'=>$barang->id_barang, 'name'=>$barang->barang, 'qty'=>1, 'price'=>
            $barang->harga]);
            Session::flash('pesan', 'Barang Telah Ditambahkan');
            return redirect()->back();
    }

    public function beli_lsg($id_barang)
    {
        $barang = Barang::where('id_barang',$id_barang)->first();
        return view('toko.detail',compact('barang'));
    }

    public function keluar()
    {
        Cart::destroy();
        Auth::logout();
        return redirect('/');
    }

    public function beli_barang()
    {
       return view('welcome');
    }
    public function bel_barang()
    {
       return view('welcome');
    }
    
}
