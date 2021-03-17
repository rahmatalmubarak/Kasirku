<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::all();
        return view('product.index', compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'capital_price' => ['required'],
            'sell_price' => ['required'],
            'stock_last' => ['required']
        ]);

        try {
            DB::transaction(function() use($request) {
                $product = new product;
                $product->name = $request->name;
                $product->type = $request->type;
                $product->capital_price = $request->capital_price;
                $product->sell_price = $request->sell_price;
                $product->stock_last = $request->stock_last;
                $product->save();
            });
            DB::commit();
            return redirect('/product')->with('status', 'Data Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('status', 'Data Gagal Ditambahkan');
            
            //throw $th;
        }

        // product::created($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('product.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
      
        // $request->validate([
        //     'name' => ['required'],
        //     'type' => ['required'],
        //     'capital_price' => ['required'],
        //     'sell_price' => ['required'],
        //     'stock_last' => ['required']
        // ]);
        // dd($product);
        try {
            DB::transaction(function() use($request, $product) { 
            $product->update([
                               'name' => $request->name,
                               'type' => $request->type,
                               'capital_price' => $request->capital_price,
                               'sell_price' => $request->sell_price,
                               'stock_last' => $request->stock_last
                           ]);
                        });
                        DB::commit();
                        return redirect('/product')->with('status','Data Berhasil Diubah!!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('status','Data Gagal Diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        product::destroy($product->id);
        return redirect('/product')->with('status','Data berhasil dihapus');
    }
    
    public function addproduct() 
    {   
        $Product = Product::all();
        return view('product.addproduct', compact('Product'));
    }
    public function add(Request $request, Product $product) 
    {
        $stok = Product::where('id', $request->produk)->value('stock_last');
        try {
            DB::transaction(function() use ($request, $product, $stok){
            $product->where('id', $request->produk)->update([
                'stock_last' => $stok + $request->stock
            ]);
            DB::commit();
        });
        return redirect('/product')->with('status', 'Tambah produk berhasil');
        // dd($th);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return redirect()->back()->with('status', 'Tambah produk Gagal');
        }
    }

    public function printBarcode()
    {
        $product = Product::limit(12)->get();
        $no =1;
        $pdf = \PDF::loadView('product.printBarcode', compact('product', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
