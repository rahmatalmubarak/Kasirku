<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class Barcode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $produk =  Product::all(); 
            foreach  ($produk as $data){
               $update =  Product::find($data->id); 
               $update->code_product =  rand(10000000, 99999999);
               $update->update();
            }
    }
}
