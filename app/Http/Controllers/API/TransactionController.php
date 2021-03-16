<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function create(Request $request)
    {
            $id = Transaction::latest('id')->first();
            $idnew = $id->id+1;
        // $request->validate([
        //     'idAkun' => 'required',
        //     'produk' => 'required',
        //     'jumlah' => 'required'
        //     ]);

        
        try {
            DB::transaction(function() use($request, $idnew){
                 $hasil = 0;
                      
                 foreach ($request->barang as $key => $value) {
                    $sell = Product::where('id',$value['produk'])->value('sell_price');
                    $capital = Product::where('id',$value['produk'])->value('capital_price');
                    $tambah = $value['jumlah'] * $sell;
                    $tambah2 = $value['jumlah'] * $capital;
                    $hasil = $tambah - $tambah2;
                    // dd($hasil);
                }
                transaction::create([
                    'id' => $idnew,
                    'users_id' => $request->idAkun,
                    'date' => date('Y-m-d'),
                    'profit' => $hasil,
                ]);
               
                
                 foreach ($request->barang as $key => $value) {
                    $transaksi = array(
                        'product_id' => $value['produk'],
                        'transaction_id' => $idnew,
                        'total' => $value['jumlah'],
                        'total_price' => '10000'
                    );
                    // dd($request->produk);
                    Detail::create($transaksi);
                }
                // dd($detail);
            });  
            DB::commit();
            return response()->json([
                'message' => 'Data berhasil di inputkan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return response()->json([
                'message' => 'Data Gagal Diinputkan'
            ]);
        }
    }

    public function delete($id) 
    {
        $transaksi = Transaction::destroy($id);
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
