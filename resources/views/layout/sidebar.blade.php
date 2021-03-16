<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link mx-auto">
      <img src="{{url('img\logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">KasirkU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/admin2.jpg')}}" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Home
                  </p>
                </a>
              </li>
               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-exchange-alt nav-icon"></i>
                  <p>
                    Transaksi
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{asset('/transaction')}}" class="nav-link">
                      <i class="fas fa-table nav-icon"></i>
                      <p>Data Transaksi</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{asset('/transaction/create')}}" class="nav-link">
                      <i class="fas fa-keyboard nav-icon"></i>
                      <p>Input Transaksi</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-shopping-basket"></i>
                  <p>
                    Produk
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/product') }}" class="nav-link">
                      <i class="fas fa-table nav-icon"></i>
                      <p>Data Produk</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/product/create') }}" class="nav-link">
                      <i class="fas fa-keyboard nav-icon"></i>
                      <p>Input Produk</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ route('addProduct') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-circle"></i>
                  <p>
                    Tambah Produk
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Userindex') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-circle"></i>
                  <p>
                    Akun
                  </p>
                </a>
              </li>
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>