@extends('layout.main')

@section('title', 'Input Transaksi')

@section('container')

<div class="col-md-6 my-3 mx-auto">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Input Produk</h3>
    </div>
</div>
        <div class="card-body col-md-12 mx-auto">
            <form action="{{ route('store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" id="name"
                    name="name" value="{{old('name')}}">
                    @error('name')<div class="invalid-feedback">{{$errors->first('name')}}</div>@enderror
                </div>
                <div class="form-group my-3">
                    <label for="formGroupExampleInput2">Jenis Produk</label>
                    <select name="type" id="type" class="form-control  @error('type') is-invalid @enderror">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                    
                </div>
                <div class="form-group my-3">
                    <label for="capital_price">Modal</label>
                    <input type="number" class="form-control  @error('capital_price') is-invalid @enderror"
                    value="{{old('capital_price')}}" placeholder="" id="capital_price" name="capital_price">
                    @error('capital_price')<div class="invalid-feedback">{{$errors->first('capital_price')}}</div>@enderror
                </div>
                <div class="form-group my-3">
                    <label for="sell_price">Harga Jual</label>
                    <input type="number" class="form-control @error('sell_price') is-invalid @enderror"
                    value="{{old('sell_price')}}" placeholder="" id="sell_price" name="sell_price">
                    @error('sell_price')<div class="invalid-feedback">{{$errors->first('sell_price')}}</div>@enderror
                </div>
                <div class="form-group my-3">
                    <label for="stock_last">Stok</label>
                    <input type="number" name="stock_last" id="stock_last"
                    class="form-control @error('stock_last')  is-invalid @enderror" value="{{old('stock_last')}}"
                    placeholder="" id="stock_last" name="stock_last">
                    @error('stock_last')<div class="invalid-feedback">{{$errors->first('stock_last')}}</div>@enderror
                </div>
                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
            </form>
        </div>
    </div>
        @endsection
        