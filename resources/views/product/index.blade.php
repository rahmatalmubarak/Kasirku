@extends('layout.main')
@section('title', 'Daftar Product')

@section('container')
<a href="/product/create" class="btn btn-primary col-3 offset-4 my-3">Tambahkan Product</a>
<div class="col-md-8  my-3 mx-auto">
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Input Product</h3>
      </div>
  </div>
        @if (session('status'))
        <div class="alert alert-success my-3">
            {{ session('status') }}
          </div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Jenis Product</th>
              <th scope="col">Modal</th>
              <th scope="col">Harga Jual</th>
              <th scope="col">Stok</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($Product as $product)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$product->name}}</td>
              <td>{{$product->type}}</td>
              <td>{{$product->capital_price}}</td>
              <td>{{$product->sell_price}}</td>
              <td>{{$product->stock_last}}</td>
              <td><a href="/edit/{{$product->id}}" class="btn btn-primary">Edit</a> 
                <form action="/product/{{$product->id}}" class="d-inline" method="post">@method('delete') @csrf
                <button class="btn btn-danger">Hapus</button></form></td>
            </tr>
            
            @endforeach
          </tbody>
        </table>
    </div>
@endsection