<?php

use App\Http\Livewire\Transaction\Create;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::middleware(['auth'])->group(function() {
        
    Route::get('/', function(){
        return redirect('/home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
    Route::get('/transaction/create', [App\Http\Controllers\TransactionController::class, 'create'])->name('create');
    Route::post('/transaction', [App\Http\Controllers\TransactionController::class, 'store'])->name('store');
    Route::delete('/transaction/{transaction}', [App\Http\Controllers\TransactionController::class, 'delete'])->name('destroy');
    
    Route::get('/detail/{detail}', [App\Http\Controllers\DetailController::class, 'show'])->name('show');
    Route::get('/detail/cetak/{detail}', [App\Http\Controllers\DetailController::class, 'cetak'])->name('cetak');
    
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
    Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
    Route::delete('/product/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
    Route::get('/product/add', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('/product/add/proses', [App\Http\Controllers\ProductController::class, 'add'])->name('addProductProses');
    Route::get('/product/barcode',  [App\Http\Controllers\ProductController::class, 'printBarcode']);
    
    Route::get('/edit/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
    Route::patch('/edit/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
    
    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('Userindex');
    Route::get('/user/create', function(){
        return view('account.create');
    });
    Route::post('/user', [\App\Http\Controllers\UserController::class, 'store'])->name('AddCustomer');
    Route::delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('Userdelete');
    // Route::get('/user/tampil', [\App\Http\Controllers\UserController::class, 'tampil'])->name('tampil');
    // Route::get('/home', [\App\Http\Controllers\HomeController::class], 'home')->name('home');
    
    Route::get('/transaction/tampil',[App\Http\Controllers\TransactionController::class, 'tampil'])->name('otomatis');
    
    Route::get('/cek', function() {
        return view('detail.cetak');
        // $tes = Auth::user();
        // dd($tes);
    });
    // Route Transactions Menggunakan Livewire
    //Route Livewire
});

Route::get('/transactions/create', Create::class);
