@extends('layout.main')

@section('title', 'Data Transaksi')

@section('container')

<a href="/transaction/create" class="btn btn-primary col-3 offset-4 my-3">Tambah Transaksi</a>
<div class="col-md-9 my-2 mx-auto">
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
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>No</th>
        <th>Customer</th>
        <th>Tanggal Transaksi</th>
        <th>Keuntungan</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
          @foreach ($transaksi as $itm => $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->date}}</td>
        <td>{{$item->profit}}</td>
        <td><a href="/detail/cetak/{{$item->id}}" class="btn btn-primary">cetak</a> 
        <a href="/detail/{{$item->id}}" class="btn btn-primary">Detail</a> 
          <form action="/transaction/{{$item->id}}" class="d-inline" method="post">@method('delete') @csrf
          <button class="btn btn-danger">Hapus</button></form></td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
{{-- <div class="col-md-6">
    <div class="card-header">
        <h3 class="card-title">Detail Transaksi</h3>
      </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10px">No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th style="width: 40px">Jumlah</th>
            <th style="width: 40px">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$}}</td>
            <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
              </div>
            </td>
            <td><span class="badge bg-danger">55%</span></td>
            <td>200000</td>
          </tr>
          
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div> --}}

  @endsection