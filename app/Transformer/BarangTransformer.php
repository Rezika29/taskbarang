<?php
namespace App\Transformer;

use App\Barang;
use League\Fractal\TransformerAbstract;

class BarangTransformer extends TransformerAbstract{
    public function transformer(Barang $barang)
    {
        return[
            'id'   =>$barang->id,
            'nama' =>$barang->nama,
            'stok' =>$barang->stok,
        ];
    }
}