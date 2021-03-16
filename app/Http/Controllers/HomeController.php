<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $product = Product::sum('products.stock_last');
        $product = Product::sum('products.stock_last');
        $user = User::where('role', 'Customer')->count('id');
        $transaksi = Transaction::where('date', date('Y-m-d'))->count('id');
        $Out = Detail::sum('total');
        return view('home', compact('product', 'user', 'transaksi', 'Out'));
    }  
    
    public function home() {
    }
}
