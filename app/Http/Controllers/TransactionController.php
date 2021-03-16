<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        
        $transaksi = DB::table('transactions')->join('users','transactions.users_id','=','users.id')
        ->select('transactions.*', 'users.name')
        ->get();
        return view('transaction.index', compact('transaksi'));
    }
    
    public function create()
    {
        $product = Product::all();
        $transaksi = Transaction::count();
        $id=0;
        
        try {
            if ($transaksi != 0) {
                $id = Transaction::latest('id')->first();
                $ids = $id->id;
         }else{
             $ids=0;
            }
            
            return view('transaction.create', compact('product', 'ids'));
            
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }    
    
    public function store(Request $request) 
    {
        $request->validate([
            'idAkun' => 'required',
            'produk' => 'required',
            'jumlah' => 'required'
            ]);
            try{
            DB::transaction(function () use($request) {
                $hasil = 0;
                $tambah = 0;
                $tambah2 = 0;
                $stok = 0;
                for ($i=0; $i < count($request->jumlah); $i++) { 
                        $sell = DB::table('products')->where('id',$request->produk[$i])->value('sell_price');
                        $capital = DB::table('products')->where('id',$request->produk[$i])->value('capital_price');
                        $stok = DB::table('products')->where('id',$request->produk[$i])->value('stock_last');
                        $tambah = ($request->jumlah[$i] * $sell);
                        $tambah2 = $request->jumlah[$i] * $capital;
                        $hasil = $tambah - $tambah2;
                        $stok2 = $request->jumlah[$i];
                        product::where('id', $request->produk[$i])->update([
                           'stock_last' => $stok - $stok2
                           ]);
                             }
                            // dd($s);
                            $transaksi = new Transaction();
                            $transaksi->id = $request->id;  
                            $transaksi->users_id = $request->idAkun;
                            $transaksi->date = now();
                            $transaksi->profit = $hasil;
                            $transaksi->save();

                            $jm=0;
                            for ($i=0; $i < count($request->jumlah); $i++) { 
                                $product = product::where('id', $request->produk[$i])->first();
                                
                                if ($product->stock_last >= $request->jumlah[$i]) {
                                    $jm +=1;
                                }
                            }
                            
                                  for ($i=0; $i < count($request->jumlah); $i++) { 
                                      $sell = DB::table('products')->where('id',$request->produk[$i])->value('sell_price');
                                             $data = new Detail();
                                             $data->product_id = $request->produk[$i];
                                             $data->transaction_id = $request->id;
                                             $data->total = $request->jumlah[$i];
                                             $data->total_price = $request->jumlah[$i] * $sell;
                                             $data->save(); 
                                            }
                                            DB::commit();
                              if($jm == count($request->jumlah)) {
                                        DB::commit();           
                                }else{
                                    DB::rollBack();
                                    return redirect()->back()->with('error', 'Transaksi Gagal!!');
                                }
                                        });
                                        return redirect('/transaction')->with('status', 'Transaksi Berhasil');
                                            
                                            
                                        } catch (\Throwable $th) {
                                            DB::rollBack();
                                            // throw $th;
                                            return redirect()->back()->with('error', 'Transaksi Gagal!!');
                                            
                                        }
                                        
    }
public function delete($id) 
{
    Transaction::destroy($id);
    return redirect()->back();
}

public function tampil(Request $request) 
{
    $id = $request->get('id');
    if($request->ajax()) {
    $data = '';
    $user = DB::select("SELECT * FROM users where id='$id'");;

    // dd($user);
    foreach($user as $usr)
    {
        $data = array(
            'nama' => $usr->name
        );
    }
    echo json_encode($data);
}
    
}
public function tes()
{
    
}
}
