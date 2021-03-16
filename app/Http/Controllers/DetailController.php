<?php

namespace App\Http\Controllers;

use App\Models\Detail;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
class DetailController extends Controller
{
    public function show($id) 
    {
        $modal = Detail::join('products', 'products.id', '=', 'details.product_id')
        ->where('transaction_id', $id)
        ->get();
        return view('detail.show', compact('modal'));
    }

    public function cetak($id) 
    {
        // dd($id);
        $cetak = Detail::join('products', 'products.id', '=', 'details.product_id')
        ->where('transaction_id', $id)
        ->get();
        $pdf = \PDF::loadView('detail.cetak', ['modal' => $cetak]);
        return $pdf->download();
        
    }

//   public function tes($id) {
//     $modal = Detail::join('product', 'product.id', '=', 'detail.product_id')
//     ->where('transaction_id', $id)
//     ->get();
//     $pdf = PDF::loadview('detail.show', compact('modal'));
//     return $pdf->download('tes');
//   }
}
