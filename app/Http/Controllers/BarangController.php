<?php

namespace App\Http\Controllers;

use App\Transformer\BarangTransformer;
use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json(Barang::all());
    }
    public function barang(Barang $barang){
        $barang=$barang->all();
        return response()->json($barang);
    }
    public function add(Request $request,Barang $barang ){
        $this->validate($request,[
           'nama_barang' => 'required',
            'stok' => 'required',

        ]);
        $barang = $barang->create([
           'nama_barang' => $request->content,
            'stok' => $request->content,

        ]);
        $response = fractal()
            ->item($barang)
            ->transformWith(new BarangTransformer)
            ->toArray();
        return response()->json($response,201);
    }

    public function update(Request $request,$id){
        $nama_barang = $request -> nama;
        $stok = $request->stok;

        $barang = Barang::find($id);
        $barang->nama_barang=$nama_barang;
        $barang->stok=$stok;
        $barang->save();

        return "Data Berhasil Diubah";
    }
    public function delete($id){
        $barang = Barang::find($id);
        $barang->delete();

        return  "Data Berhasil Dihapus";
    }
}
