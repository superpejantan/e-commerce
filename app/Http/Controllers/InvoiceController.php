<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use DB;
use App\konfirmasi;
use App\Models\Pesanan;
use App\Models\Barang_pesanan;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    public function index()
    {
        $barang = Cart::content();
        $total = Cart::subtotal();

        $id_users = Auth::user()->id_users;
       
       
        return view('toko.invoiceshop',['barang'=>$barang, 'total'=>$total]);

    }

    public function list()
    {
        return view('toko.userinvoice');
    }

    public function yajra_list()
    {
        $id_users = Auth::user()->id_users;
        $dipesanan = Pesanan::where('id_users',$id_users)->orderBy('id','desc')->get();

        return Datatables::of($dipesanan)
        ->addColumn('action', function ($dipesanan) {
            $id = $dipesanan->id;
            return '<a href="#" id-p="'.$id.'" class="btn btn-xs btn-primary btn-edit"></i> Edit</a>';
        })->editColumn('nama', function($nama){
            $p_nama = $nama->nama_penerima;
            return $p_nama;
        })->editColumn('alamat', function($alamt){
            $almt = $alamt->alamat;
            return $almt;
        })->editColumn('bayar', function($bayar){
            $byr = $bayar->total_bayar;
            return $byr;
        })->make(true);
    }

    public function get_pesanan($id)
    {
        $pesanan = pesanan::where('id', $id)->first();

        return response()->json([
            'id'=> $pesanan->id
        ]);
    }

    public function konfirmasi()
    {
            return view('tambah.konfirmasi_bayar');
    }



    public function detail($id_pesanan)
    {
        $detail = Pesanan_barang::where('id_pesanan',$id_pesanan)->get();
        $pesanan = array();

        foreach ($detail as $key => $detail){
            $detailArray = array();
            $detailArray['nama_barang'] = $detail->barang->nama;
            $detailArray['qty'] = $detail->qty;
            $detailArray['subtotal'] = $detail->subtotal;
            array_push($pesanan, $detailArray);
        }
        return response()->json([
            'hasil'=>$pesanan
        ]);
    } 

    public function showbayar()
    {
        return view('toko.showpembyaran');
    }

    

    public function konfirmasi_bayar(Request $request)
    {
        $this->validate($request, [
        'id_pesanan'=> 'integer',
        'file'=> 'required|file|max:2000',
        'bayar' => 'integer',
        ]);
                $id = $request->get('id_pesanan');
                $upload = $request->file('file');
                $path = $upload->store('public/konfirmasi');
                $harga = $request->get('bayar');
                $id_status = 2;
   
                $file = new konfirmasi;
                $file->id_pesanan = $id;
                $file->gambar = $upload->getClientOriginalName();
                $file->bayar = $harga;
                $file->path = $path;
                $file->save();

            $update = DB::update('update pesanan set id_status=? where id_pesanan=?', [$id_status, $id]);

         return redirect()->back();
    
    }
     
}
