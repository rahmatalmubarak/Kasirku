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
    <div class="card">
    <form method="post" action="{{ url('transaction') }}">
      @csrf
      <input type="text" class="form-control" name="id" id="id" value="{{$ids+1}}" wire:model="ids" hidden>  
      <div class="card-body">
        <div class="row g-2">
          <div class="col-md">
            <div class="form-floating">
              <label for="floatingSelectGrid">ID Customer</label>
              <input type="text" class="form-control  @error('idAkun') is-invalid @enderror" onkeyup="otomatis()" name="idAkun" id="idAkun" placeholder="input ID Akun" value="{{old('idAkun')}}" wire:model="customer">         
              @error('idAkun')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-floating">
              <label for="floatingInputGrid">Nama Customer</label>
                <input type="text" class="form-control" name="nama" id="nama"  placeholder="" readonly>
            </div>
          </div>
        </div>
      </div>
          <div class="card-body">
          <div class="row g-2">
            <div class="col-md-5">
              <div class="form-floating">
                <select name="produk" id="produk" class="form-control" wire:model="produk">
                  @foreach ($product as $produk)<option value="{{$produk->id}}">{{$produk->name}}</option>@endforeach
                </select>                
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                  <input type="text" class="form-control  @error('jumlah') is-invalid @enderror" value="{{old('jumlah')}}" 
                  name="jumlah" id="jumlah" placeholder="input Jumlah" wire:model="jumlah">
                  @error('jumlah')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
    </div>
  </form>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Responsive Hover Table</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
            {{-- @foreach ($temporary as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->sell_price}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->total * $item->sell_price}}</td>
            </tr>
            @endforeach --}}
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
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