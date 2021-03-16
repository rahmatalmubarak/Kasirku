@extends('layout.main')
@section('title', 'Daftar Transaksi')
@section('container')

<div class="col-md-8 mx-auto my-2">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Transaksi</h3>
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
        <th scope="col">Harga</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    @php
        $jum = 0;
    @endphp

    @foreach ($modal as $modals => $item)
    <tbody>
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->sell_price}}</td>
        <td>{{$item->total}}</td>
        <td>{{$item->total_price}}</td>
      </tr>
    </tbody>
    @php
        
        $jum += $item->total_price;
        
    @endphp
    @endforeach
    <td></td>
    <td></td>
    <td></td>
    <td>Total bayar</td>
    <td>@php
        echo $jum;
    @endphp</td>
  </table>
  {{-- <a href="/detail/cetak/{{$item->transaction_id}}" target="_blank" class="btn btn-danger">print</a> --}}

</div>
@endsection