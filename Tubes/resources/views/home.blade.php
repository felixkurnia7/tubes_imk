@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Cara Pemesanan Pakaian Website DILA F-fashion</h4>
              <h5 style="color: white">Tentukan barang yang ingin Anda pesan</h5>
              <h5 style="color: white">Pesanan Anda akan dikonfirmasi oleh Admin (akun resmi dapat dilihat pada 'Tentang Kami')</h5>
              <h5 style="color: white">Jika Admin tidak mendapat balasan maka pesanan Anda terpaksa ditolak</h5>
              <h5 style="color: white">Pesanan Anda dapat dilihat pada profile Anda</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    @if(Session::has('success'))
      <div class="alert alert-success">
          <center>{{ Session::get('success') }}</center>
          @php
              Session::forget('success');
          @endphp
      </div>
    @endif

    @foreach($result1 as $data1)
    <!-- Modal Jual -->
<div class="modal fade" id="exampleModalCenterJual{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
          <img src="../images/{{$data1->gambar}}" alt="" >
          <div class="down-content">
            <form action="/index/pesanan(jual)/{{Auth::user()->id}}/{{$data1->id}}/{{$data1->harga}}" method="post">
              @csrf
                <h4>{{$data1->nama}}</h4>
                <h6>Rp{{$data1->harga}}</h6>
                <p>Ukuran: {{$data1->ukuran}} &nbsp; Warna: {{$data1->warna}} &nbsp; 
                  @if ($data1->stok <= 0)
                  Total Stok: Habis</td>
                  @endif

                  @if ($data1->stok > 0)
                  Total Stok: {{$data1->stok}}</td>
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
                        <td><input type="radio" id="cash{{$data1->id}}" name="transaksi" value="cash"><label for="cash{{$data1->id}}">Cash</label>
                        <input type="radio" id="transfer{{$data1->id}}" name="transaksi" value="transfer"><label for="transfer{{$data1->id}}">Transfer</label>
                        <input type="radio" id="e-wallet{{$data1->id}}" name="transaksi" value="e-wallet"><label for="e-wallet{{$data1->id}}">E-wallet</label></td>
                    </tr>
                    <tr>
                      <td>Jenis Pesanan</td>
                      <td>:</td>
                        <td><input type="radio" id="antar{{$data1->id}}" name="jenis_pesanan" value="antar"><label for="antar{{$data1->id}}">Antar</label>
                        <input type="radio" id="jemput{{$data1->id}}" name="jenis_pesanan" value="jemput"><label for="jemput{{$data1->id}}">Jemput</label>
                    </tr>
                    <tr><td>&nbsp;</td>
                      <td>&nbsp;</td>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      @if ($data1->stok > 0)
                      <td><button type="submit" class="btn btn-danger">Pesan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></td>
                      @endif
                      @if ($data1->stok <= 0)
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
</div>
@endforeach

@foreach($result2 as $data2)
<!-- Modal Sewa -->
<div class="modal fade" id="exampleModalCenterSewa{{$data2->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
          <img src="../images/{{$data2->gambar}}" alt="" >
          <div class="down-content">
          <form action="/index/pesanan(sewa)/{{Auth::user()->id}}/{{$data2->id}}/{{$data2->harga}}" method="post">
            @csrf
            <h4>{{$data2->nama}}</h4>
            <h6>Rp{{$data2->harga}}</h6>
            <p>Ukuran: {{$data2->ukuran}} &nbsp; Warna: {{$data2->warna}} &nbsp; 
              @if ($data2->stok <= 0)
              Total Stok: Habis</td>
              @endif

              @if ($data2->stok > 0)
              Total Stok: {{$data2->stok}}</td>
              @endif
              <table>
                <tr>
                  <td>Sewa</td>
                  <td>:</td>
                  <td><input name="banyak" type="number" class="form-control"></td>
                </tr>
                <tr>
                  <td>Transaksi</td>
                  <td>:</td>
                    <td><input type="radio" id="cash{{$data2->id}}" name="transaksi" value="cash"><label for="cash{{$data2->id}}">Cash</label>
                    <input type="radio" id="transfer{{$data2->id}}" name="transaksi" value="transfer"><label for="transfer{{$data2->id}}">Transfer</label>
                    <input type="radio" id="e-wallet{{$data2->id}}" name="transaksi" value="e-wallet"><label for="e-wallet{{$data2->id}}">E-wallet</label></td>
                </tr>
                <tr>
                  <td>Jenis Pesanan</td>
                  <td>:</td>
                    <td><input type="radio" id="antar{{$data2->id}}" name="jenis_pesanan" value="antar"><label for="antar{{$data2->id}}">Antar</label>
                    <input type="radio" id="jemput{{$data2->id}}" name="jenis_pesanan" value="jemput"><label for="jemput{{$data2->id}}">Jemput</label>
                </tr>
                <tr><td>&nbsp;</td>
                  <td>&nbsp;</td>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  @if ($data2->stok > 0)
                  <td><button type="submit" class="btn btn-danger">Pesan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></td>
                  @endif
                  @if ($data2->stok <= 0)
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
</div>
@endforeach

  {{-- Jual --}}
    <div class="latest-products">
      <div class="container">
        <div class="row">
          @if(Session::has('success'))
            <div class="alert alert-success">
                <center>{{ Session::get('success') }}</center>
                @php
                    Session::forget('success');
                @endphp
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
              <a href="/penjualan">Lihat Semua <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          
          @foreach($result1 as $data1)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#" data-toggle="modal" data-target="#exampleModalCenterJual{{$data1->id}}"><img src="../images/{{$data1->gambar}}" alt="" height="375"></a>
              <div class="down-content">
                <a href="#" data-toggle="modal" data-target="#exampleModalCenterJual{{$data1->id}}" ><h5>{{$data1->nama}}</h5></a>
                <h4>Rp{{$data1->harga}}</h4>
                <table>
                  <tr>
                    <td>Ukuran: {{$data1->ukuran}} &nbsp; 
                      @if ($data1->stok <= 0)
                      Total Stok: Habis</td>
                      @endif

                      @if ($data1->stok > 0)
                      Total Stok: {{$data1->stok}}</td>
                      @endif
                      
                  </tr>
                  <tr>
                    <td>Warna: {{$data1->warna}}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    
    {{-- Sewa --}}
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Penyewaan</h2>
              <a href="/penyewaan">Lihat Semua <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          @foreach($result2 as $data2)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#" data-toggle="modal" data-target="#exampleModalCenterSewa{{$data2->id}}"><img src="../images/{{$data2->gambar}}" alt="" height="375"></a>
              <div class="down-content">
                <a href="#" data-toggle="modal" data-target="#exampleModalCenterSewa{{$data2->id}}" ><h5>{{$data2->nama}}</h5></a>
                <h4>Rp{{$data2->harga}}</h4>
                <table>
                  <tr>
                    <td>Ukuran: {{$data2->ukuran}} &nbsp;
                      @if ($data2->stok <= 0)
                      Total Stok: Habis</td>
                      @endif

                      @if ($data2->stok > 0)
                      Total Stok: {{$data2->stok}}</td>
                      @endif
                  </tr>
                  <tr>
                    <td>Warna: {{$data2->warna}}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endsection