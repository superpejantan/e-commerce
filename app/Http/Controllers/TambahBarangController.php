<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Barang;

class TambahBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tambah.uploadbarang');
    }


    public function tampil()
    {
        $Barang = DB::table('barang')->get();
        return view('tambah.tampil', ['Barang'=>$Barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'desc'=> 'required'
            
        ]);
        
        $path = $request->get('desc');

        $file = new Barang;
        $file->nama = $path;
        $file->save();
    
        
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'id_brg'=> 'integer',
        'file'=> 'required|file|max:2000',
        'harga' => 'integer',
        'jumlah' => 'integer',
        'barang'=> 'required',
        'kategori'=> 'integer'
       
        
    ]);
    $id = $request->get('id_brg');
    $barang = $request->get('barang');
    $upload = $request->file('file');
    $path = $upload->store('public/Storage');
    $harga = $request->get('harga');
    $jumlah = $request->get('jumlah');
    $kategori = $request->get('kategori');
    $total = $jumlah * $harga;
    
   

    $file = new Barang;
    $file->id_barang = $id;
    $file->barang= $barang;
    $file->gambar = $upload->getClientOriginalName();
    $file->harga = $harga;
    $file->jumlah = $jumlah;
    $file->total = $total;
    $file->id_kategori = $kategori;
    $file->path = $path;
    $file->save();

    
    return redirect()->back();
}
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
