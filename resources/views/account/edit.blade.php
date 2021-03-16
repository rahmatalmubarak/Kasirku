@extends('layout.main')
@section('title', 'Edit Akun')

@section('container')
<h1 class="danger my-3">Edit Account</h1>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="mt-3">
                <form action="/account/{{$account->id}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" id="name" name="name" value="{{$account->name}}">
                    @error('name')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="formGroupExampleInput2">Jenis Kelamin</label>
                        <input type="text" class="form-control  @error('gender') is-invalid @enderror" placeholder="" id="formGroupExampleInput2" value="{{$account->gender}}" name="gender">
                        @error('gender')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" value="{{$account->username}}" placeholder="" id="username" name="username">
                        @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                    
                    <div class="form-group my-3">
                        <label for="role">role</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role1" {{$account->role == 'Admin'?'checked' : ''}}> 
                            <label class="form-check-label" for="role1">
                              Admin
                            </label>
                        </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role1" {{$account->role == 'Customer'?'checked' : ''}}> 
                            <label class="form-check-label" for="role1">
                              Customer
                            </label>
                             </div>

                    </div>
                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
