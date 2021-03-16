@extends('layout.main')

@section('title', 'Tambah Produk')

@section('container')

<div class="col-md-6 my-3 mx-auto">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Produk</h3>
    </div>
</div>
        <div class="card-body col-md-12 mx-auto">
            <form action="{{ route('addProductProses') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                        <select name="produk" id="produk" class="form-control">
                          @foreach ($Product as $produk)<option value="{{$produk->id}}">{{$produk->name}}</option>@endforeach
                        </select>                
                      @error('name')<div class="invalid-feedback">{{$errors->first('name')}}</div>@enderror
                </div>
                <div class="form-group my-3">
                    <label for="stock">Tambahan Stock</label>
                    <input type="number" class="form-control  @error('stock') is-invalid @enderror"
                    value="{{old('stock')}}" placeholder="" id="stock" name="stock">
                    @error('stock')<div class="invalid-feedback">{{$errors->first('stock')}}</div>@enderror
                </div>
                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
            </form>
        </div>
    </div>
        @endsection
        