<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Product;
use App\Models\Temporary;
use App\Models\Transaction;
use Livewire\Component;

class Create extends Component
{
    public $ids;
    public $customer;
    public $produk;
    public $jumlah;
    
    public function store()
    {
        
    }
    
    public function render()
    {
        $id = Transaction::latest('id')->first();
        $idnew = $id->id;
        $produk = Product::all();
        $temporary = Temporary::all();
        return view('livewire.transaction.create', ['product' => $produk], ['ids' => $idnew], ['temporary' => $temporary]);
    }
}
