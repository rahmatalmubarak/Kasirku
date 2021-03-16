@extends('layout.main')

@section('title', 'Tambahkan Transaksi')

@section('container')
<div class="col-md-6">
        <form action="/detail" method="post">
            @csrf  
            <input type="text" class="form-control" name="id" id="id" value="{{$id+1}}" hidden>
            <h2>Tambahkan Transaksi</h2>
            @if (session('status'))
            <div class="alert alert-success my-3">
                {{ session('status') }}
            </div>
            @endif
            <table class="table ">
                <thead>
                    <tr class="my-5">
                        <th>ID Customer<input type="text" class="form-control" name="idname" id="id" ></th>
                        <th>Nama Customer<input type="text" class="form-control" id="idname" disabled></th>
                        <th><input type="text" class="form-control" name="date" id="date" value="@php
                            echo date("now");  
                        @endphp" disabled></th>
                    </tr>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th><a href="javascript:;" class="btn btn-info addRow">+</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <select name="product[]" id="product" class="form-control ">
                                @foreach ($product as $produk) <option value="{{$produk->id}}">{{$produk->name}}
                                </option>@endforeach
                            </select>
                        </td>
                       
                        <td>
                            <input type="number" class="form-control" name="jumlah[]" id="jumlah">
                        </td>

                        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>
</div>
<script>
    $('thead').on('click', '.addRow', function () {
        var tr = '<tr>' +
            '<td>' +
            ' <select name="product[]" id="product" class="form-control ">' +
            ' @foreach ($product as $produk) <option value="{{$produk->id}}">{{$produk->name}}</option>@endforeach' +
            '</select>' +
            ' </td>' +
            '<td>' +
            ' <input type="number" class="form-control" name="jumlah[]" id="jumlah">' +
            '</td>' +
            '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>' +
            '</tr>';

        $('tbody').append(tr);
    });
    $('tbody').on('click', '.deleteRow', function () {
        $(this).parent().parent().remove()
    });
    

</script>
@endsection
