@extends('layout.main')
@section('title', 'Detail Akun')
@section('container')
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Detail Akun</h5>
        <p class="card-text">Nama : {{$account->name}}</p>
        <p class="card-text">Jenis Kelamin : {{$account->gender}}</p>
        <p class="card-text">Role : {{$account->role}}</p>
        <a href="{{$account->id}}/edit" class="btn btn-primary">Edit</a>
        <form action="{{$account->id}}" method="post" class="d-inline">@method('delete') @csrf <button class="btn btn-danger">Delete</button></form>
        <a href="{{url('/account')}}" class="card-link d-lg-table-row my-3">Back</a>
    </div>
    
</div>
@endsection

