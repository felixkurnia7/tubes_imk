@extends('layouts.app')

@section('content')
    
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
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  @if ($data->stok > 0)
                    
                    <td>
                      <button type="submit" class="btn btn-danger">Pesan</button>
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
          {{-- <div class="col-lg-4 col-md-4">
            <div class="filters">
              <ul>
              </ul>
            </div>
          </div> --}}
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
          <div class="section-heading">
            <h2>Penjualan</h2>
            <form action="/search/penjualan">
              <div class="input-group">
                <input class="form-control" name="search" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-danger" id="btnNavbarSearch" type="submit">Search</button>
              </div>
            </form>
            {{-- <table>
              <tr>
                <input type="text" name="search" class="form-control" placeholder="Search..." column="2">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  search
                </button>
              </tr>
            </table> --}}
          </div>
            <div class="filters-content">
                <div class="row grid">

                    @foreach ($result as $data)
                    <div class="col-lg-4 col-md-4 all">
                      <div class="product-item">
                        <a data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}"><img src="../images/{{$data->gambar}}" height="375"></a>
                        <div class="down-content">
                          <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}"><h5>
                            {{$data->nama}}</h5></a>
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

  @endsection