@extends('layout.main')

@section('title', 'Home')

@section('container')

          <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$transaksi}}</h3>

                <p>Transaksi Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$product}}</sup></h3>

                <p>Jumlah Stock Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('/product', []) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$user}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('/user', []) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$Out}}</h3>

                <p>Jumlah Stok Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas"></i></a>
            </div>
          </div>
          <!-- ./col -->
    </section>

@endsection
