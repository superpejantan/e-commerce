<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Schema;
use DB;
use GuzzleHttp\Client;
use App\propinsi;
use App\Kota;
use Auth;
use App\pembayaran;
use Cart;

class RajaOngkirController extends Controller
{
    public function index()
    {
        return "Cek ongkos kirim";
    }

    public function getpropinsi()
    {
        $client = new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/province',
            array(
                'headers' => array(
                   'key' => '3e0628b2a7e159553dab881965f486ee',
                )
            )
            );
        } catch(RequestException $e){
        var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);

       for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++)
       {
           $province = new \App\propinsi;
           $province->id = $array_result["rajaongkir"]["results"][$i]["province_id"];
           $province->name = $array_result["rajaongkir"]["results"][$i]["province"];
           $province->save();
       }
        
    }

    public function kota()
    {
        $client = new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/city',
            array(
                'headers' => array(
                   'key' => '3e0628b2a7e159553dab881965f486ee',
                )
            )
        );
        } catch(RequestException $e){
        var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);

        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++)
        {
            $kota = new \App\kota;
            $kota->id = $array_result["rajaongkir"]["results"][$i]["city_id"];
            $kota->name = $array_result["rajaongkir"]["results"][$i]["city_name"];
            $kota->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $kota->save();
        }
        //echo $array_result["rajaongkir"]["results"][22]["city_name"];
    }

    public function cek_ongkir(Request $request)
    {   
        $nama = $request->nama_penerima;
        $alamat = $request->alamat;
        $no = $request->no_hp;
        $berat = $request->weight;

        $title = "Status pegiriman";
        $bank = pembayaran::get();
        $keranjang = Cart::content();
        $client = new Client();

        try{
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
            [
            'body'=> 'origin=22&destination='.$request->destination.'&weight='.$request->weight.'&courier=jne',
            'headers' => [
            'key' => '3e0628b2a7e159553dab881965f486ee',
            'content-type' => 'application/x-www-form-urlencoded',
            ]
            ]
        );
        } catch(RequestException $e){
        var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
     $array_result = json_decode($json, true);

        $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];

   

        //echo $array_result["rajaongkir"]["results"][0]["costs"][0]["value"];
        return view('Toko.ongkoskirim', compact('bank','title','origin','destination','array_result','alamat','nama','no','berat','keranjang'));
    }

    public function get_kota()
    {
        $kota = kota::get();
        return view ('toko.check-out', compact('kota'));
    }

    

    public function Cetak_Ongkir(Request $request)

    {
        $id_user = Auth::user()->id_users;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $tujuan = $request->tujuan;
        $no = $request->no_hp;
        $cost = $request->cost;
        $ongkir = $request->ongkir;
        $waktu = $request->waktu;

        DB::table('pelanggan')->insert([
            'id_user'=>$id_user,
            'nama'=>$nama,
            'alamat'=>$alamat,
            'tujuan'=>$tujuan,
            'no_hp'=>$no,
            'biaya'=>$ongkir,
            'paket'=>$cost,
            'waktu'=>$waktu
        ]);
        return redirect('invoice/list');


    }
}
