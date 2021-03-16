<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'capital_price' => 'required',
            'sell_price' => 'required',
            'stock_last' => 'required'
        ]);
        try {
            DB::transaction(function() use ($request){
    
                $user = Product::create([
                    'name' => $request->name,
                    'type' => $request->type,
                    'capital_price' => $request->capital_price,
                    'sell_price' => $request->sell_price,
                    'stock_last' => $request->stock_last
                    ]);
                    DB::commit();
                });
                return response()->json([
                    'message' => 'Data berhasil di input',
                    // 'data' => $user
                ]);
        } catch (\Throwable $th) {
                DB::rollBack();
        }

        

    }

    public function edit($id) 
    {
       $product = Product::findOrfail($id);


        return response()->json([
            'message' => 'Data berhasil di input',
            'data' => $product
        ]);
    }
     public function update(Request $request, $id)
     {
         $product = Product::findOrfail($id);
         $request->validate([
             'name' => 'required',
             'type' => 'required',
             'capital_price' => 'required',
             'sell_price' => 'required',
             'stock_last' => 'required'
             ]);
             try {
                 DB::transaction(function() use($request, $product){
                     $product->update([
                         'name' => $request->name,
                         'type' => $request->type,
                         'capital_price' => $request->capital_price,
                         'sell_price' => $request->sell_price,
                         'stock_last' => $request->stock_last
                     ]);
                     DB::commit();     
                 });
                 //code...
             } catch (\Throwable $th) {
                 //throw $th;
                 DB::rollBack();
             }

        return response()->json([
            'message' => 'Data berhasil di update',
            'data' => $product
        ]);
     }
     public function delete($id)
     {
         $product = Product::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus',
            'data' => $product
        ]);
     }
}
