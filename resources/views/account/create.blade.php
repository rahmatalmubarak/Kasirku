@extends('layout.main')
@section('title', 'Tambahkan data')

@section('container')
<div class="col-md-6 my-3 mx-auto">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Customer</h3>
        </div>
    </div>
    <div class="col-11 mx-auto">
    <form action="{{ route('AddCustomer') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" id="name" name="name" value="{{old('name')}}">
            @error('name')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="" id="email" name="email" value="{{old('email')}}">
            @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="" id="password" password="password" value="{{old('password')}}">
            @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group my-3">

            <input type="text" class="form-control" placeholder="" id="role" name="role" value="customer" hidden>
        </div>
        <div class="form-group">
            <label for="">Password Confirmation</label>
            <input type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password" placeholder="">
        </div>
        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
    </form>

    </div>
</div>
@endsection
