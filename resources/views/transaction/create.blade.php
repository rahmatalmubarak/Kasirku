@extends('layout.main')

@section('title', 'Input Transaksi')

@section('container')

<div class="col-md-8 my-3 mx-auto">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Input Transaksi</h3>
    </div>
</div>
@if (session('error'))
<div class="alert alert-success my-3">
  {{ session('error') }}
</div>
@endif
    
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ url('transaction') }}">
      @csrf
      <input type="text" class="form-control" name="id" id="id" value="{{$ids+1}}" hidden>  
      <div class="card-body">
        <div class="row g-2">
          <div class="col-md">
            <div class="form-floating">
              <label for="floatingSelectGrid">ID Customer</label>
              <input type="text" class="form-control  @error('idAkun') is-invalid @enderror" onkeyup="otomatis()" name="idAkun" id="idAkun" placeholder="input ID Akun" value="{{old('idAkun')}}">         
              @error('idAkun')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <label for="floatingInputGrid">Nama Customer</label>
                <input type="text" class="form-control" name="nama" id="nama"  placeholder="" readonly>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <button class="btn btn-success add-more" type="button">
          <i class="glyphicon glyphicon-plus"></i> Add
        </button>
      </div>
        <div class="copy hide">
        <div class="control-group">
          <div class="card-body">
          <div class="row g-2">
            <div class="col-md">
              <div class="form-floating">
                <select name="produk[]" id="produk" class="form-control">
                  @foreach ($product as $produk)<option value="{{$produk->id}}">{{$produk->name}}</option>@endforeach
                </select>                
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                  <input type="text" class="form-control  @error('jumlah') is-invalid @enderror" value="{{old('jumlah')}}" name="jumlah[]" id="jumlah" placeholder="input Jumlah">
                  @error('jumlah')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="control-group after-add-more"> 
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<script>
      $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
    function otomatis() {
        var id = $("#idAkun").val();
        $.ajax({

            url: '{{route('otomatis')}}',
            method : 'GET',
            data: "id=" + id,
            success: function (data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nama').val(obj.nama);

            }
        });
    };
</script>
@endsection