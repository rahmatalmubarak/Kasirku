@extends('layout.main')
@section('title', 'Akun')
@section('container')


<a href="/user/create" class="btn btn-primary col-3 offset-4 my-3">+ Tambah Data</a>
<div class="col-md-9 my-3 mx-auto">
  <div class="card card-primary">
      <div class="card-header">
        
        <h3 class="card-title">Input Transaksi</h3>
      </div>
      @if (session('status'))
    <div class="alert alert-success my-3">
      {{ session('status') }}
    </div>
@endif
  </div>
<table class="table">
    <thead>

        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Aksi</th>
        
    </thead>
    @foreach ($user as $account)
    <tbody>
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$account->name}}</td>
        <td>{{$account->email}}</td>
        <td>{{$account->role}}</td>
        <td>
        <form action="/user/{{$account->id}}" method="POST" class="d-inline" >@method('delete') @csrf <button class="btn btn-danger">Hapus</button></form>  
        </td> 
      </tr>
    </tbody>
    @endforeach
</table>
</div>
<div class="col-md-10">
</div>
@endsection 