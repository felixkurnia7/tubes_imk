<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/index"><h2>Dila <em>F-fashion</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              @if(Auth::user()->role == 'admin')
              <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">admin</a>
              </li>
              @endif
              @if(Auth::user()->role == 'user')
              <li class="nav-item">
                <a class="nav-link" href="/user/dashboard">{{Auth::user()->name}}</a>
              </li>
              @endif

              
              <li class="nav-item">
                <a class="nav-link" href="/penjualan">Penjualan</a>
              </li><li class="nav-item">
                <a class="nav-link" href="/penyewaan">Penyewaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/tentang_kami">Tentang Kami</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="/contact">Contact Us</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Cara Pemesanan Pakaian Website DILA F-fashion</h4>
              <h5 style="color: white">Tentukan barang yang ingin Anda pesan</h5>
              <h5 style="color: white">Pesanan Anda akan dikonfirmasi oleh Admin (akun resmi dapat dilihat pada Tentang Kami)</h5>
              <h5 style="color: white">Jika Admin tidak mendapat balasan maka pesanan Anda terpaksa ditolak</h5>
              <h5 style="color: white">Pesanan Anda dapat dilihat pada profile Anda</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    @foreach($result as $data)
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="product-item">
          <img src="../images/{{$data->gambar}}">
          <div class="down-content">
          <form action="/pesanan(jual)/{{Auth::user()->id}}/{{$data->id}}/{{$data->harga}}" method="post">
          @csrf
            <h4>{{$data->nama}}</h4>
            <h6>Rp{{$data->harga}}</h6>
            <p>Ukuran: {{$data->ukuran}} &nbsp; Warna: {{$data->warna}} &nbsp;
              @if ($data->stok <= 0)
              Total Stok: Habis</td>
              @endif

              @if ($data->stok > 0)
              Total Stok: {{$data->stok}}</td>
              @endif
            
              <table>
                <tr>
                  <td>Beli</td>
                  <td>:</td>
                  <td><input name="banyak" type="number" class="form-control"></td>
                </tr>
                <tr>
                  <td>Transaksi</td>
                  <td>:</td>
                    <td><input type="radio" id="cash{{$data->id}}" name="transaksi" value="cash"><label for="cash{{$data->id}}">Cash</label>
                    <input type="radio" id="transfer{{$data->id}}" name="transaksi" value="transfer"><label for="transfer{{$data->id}}">Transfer</label>
                    <input type="radio" id="e-wallet{{$data->id}}" name="transaksi" value="e-wallet"><label for="e-wallet{{$data->id}}">E-wallet</label></td>
                </tr>
                <tr>
                  <td>Jenis Pesanan</td>
                  <td>:</td>
                    <td><input type="radio" id="antar{{$data->id}}" name="jenis_pesanan" value="antar"><label for="antar{{$data->id}}">Antar</label>
                    <input type="radio" id="jemput{{$data->id}}" name="jenis_pesanan" value="jemput"><label for="jemput{{$data->id}}">Jemput</label>
                </tr>
                <tr><td>&nbsp;</td>
                  <td>&nbsp;</td>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  @if ($data->stok > 0)
                  <td><button type="submit" class="btn btn-danger">Pesan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></td>
                  @endif
                  @if ($data->stok <= 0)
                  <td><a class="filled-button" style="color: white">Barang Kosong</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></td>
                  @endif
                </tr>
              </table>
           </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endforeach

    
    <div class="products">
      <div class="container">
        <div class="row">
          {{-- <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
              </ul>
            </div>
          </div>  --}}
          @if(Session::has('success'))
          <div class="col-md-12">
            <div class="alert alert-success">
                <center>{{ Session::get('success') }}</center>
                @php
                    Session::forget('success');
                @endphp
            </div>
          </div>
          @endif
          <div class="col-md-12">
            @if ($errors->has('banyak'))
            <center>
                <span class="text-danger">{{ $errors->first('banyak') }}</span>
                <br>
              </center>
            @endif
            @if ($errors->has('transaksi'))
            <center>
                <span class="text-danger">{{ $errors->first('transaksi') }}</span>
                <br>
              </center>
            @endif
            @if ($errors->has('jenis_pesanan'))
            <center>
                <span class="text-danger">{{ $errors->first('jenis_pesanan') }}</span>
                <br>
              </center>
            @endif
          </div>
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Penjualan</h2>
              <form action="/search/penjualan">
                <div class="input-group">
                  <input class="form-control" name="search" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                  <button class="btn btn-danger" id="btnNavbarSearch" type="submit">Search</button>
                </div>
              </form>
              <h4>&nbsp;</h4>
              <h4>Cari: {{$search}}</h4>
              <h4>&nbsp;</h4>
            </div>
            <div class="filters-content">
                <div class="row grid">
                  
                    @foreach ($result as $data)
                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}"><img src="../images/{{$data->gambar}}" height="375"></a>
                        <div class="down-content">
                          <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}"><h5>{{$data->nama}}</h5></a>
                          <h4>Rp{{$data->harga}}</h4>
                          <table>
                            <tr>
                              <td>Ukuran: {{$data->ukuran}} &nbsp; 
                                @if ($data->stok <= 0)
                                Total Stok: Habis</td>
                                @endif

                                @if ($data->stok > 0)
                                Total Stok: {{$data->stok}}</td>
                                @endif
                            </tr>
                            <tr>
                              <td>Warna: {{$data->warna}}</td>
                            </tr>
                          </table>
                          {{-- <p></p> <p> &nbsp; </p> --}}
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="pagination">
              {{$result->links("pagination::bootstrap-4")}}
              </ul>
          </div>
          
          
        </div>
      </div>
    </div>
    {{-- <div class="col-md-12">
      <ul class="pages">
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
      </ul>
    </div> --}}


    <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="inner-content">
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
  
  
      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
  
      <!-- Additional Scripts -->
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <script src="{{ asset('assets/js/owl.js') }}"></script>
      <script src="{{ asset('assets/js/slick.js') }}"></script>
      <script src="{{ asset('assets/js/isotope.js') }}"></script>
      <script src="{{ asset('assets/js/accordions.js') }}"></script>
  
  
      <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }
      </script>
  
  
    </body>
  
  </html>

