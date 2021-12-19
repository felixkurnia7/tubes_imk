<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{$title}}</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/index">Dila F-fashion</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item">{{Auth::user()->name}}</a></li>
                        <li><a class="dropdown-item">{{Auth::user()->role}}</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="/index">
                                <div class="sb-nav-link-icon"></div>
                                Toko
                            </a>
                            
                            <a class="nav-link" href="/user/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/user/profile/{{Auth::user()->id}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profile
                            </a>
                            

                            <div class="sb-sidenav-menu-heading">Riwayat</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pesanan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/user/pesanan(jual)/{{Auth::user()->id}}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Pesanan Barang (Jual)</a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/user/pesanan(sewa)/{{Auth::user()->id}}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Pesanan Barang (Sewa)</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Riwayat Pesanan Barang (Jual)</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        {{-- @if(Session::has('success'))
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <h6 class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                            </h6>
                            </li>
                        </ol>
                        @endif --}}
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pesanan Barang (Jual)
                            </div>
                            <?php $i = 1 ?>
                            <div class="card-body">
                                {{-- <a class="btn btn-success" href="/admin/barang(jual)/tambah">Tambah barang</a> --}}
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Barang</th>
                                            <th>Banyak</th>
                                            <th>Total Harga</th>
                                            <th>Transaksi</th>
                                            <th>Jenis Pesanan</th>
                                            <th>Gambar</th>
                                            <th>Tanggal</th>
                                            <th colspan="6">Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Barang</th>
                                            <th>Banyak</th>
                                            <th>Total Harga</th>
                                            <th>Transaksi</th>
                                            <th>Jenis Pesanan</th>
                                            <th>Gambar</th>
                                            <th>Tanggal</th>
                                            <th colspan="6">Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($result as $data)
                                        <tr>
                                            <td hidden>{{$data->id}}</td>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->sells->nama}}</td>
                                            <td>{{$data->banyak}}</td>
                                            <td>{{$data->harga}}</td>
                                            <td>{{$data->transaksi}}</td>
                                            <td>{{$data->jenis_pesanan}}</td>
                                            <td><img src="/images/{{$data->sells->gambar}}" alt="" height="50"></td>
                                            <td>{{$data->created_at}}</td>
                                            @if ($data->status_konfirmasi == '0')
                                                <td colspan="3"><a class="btn btn-danger">Belum Dikonfirmasi</a></td>
                                                <td colspan="3"><a class="btn btn-danger">Belum Dikirim</a></td>
                                            @endif

                                            @if ($data->status_konfirmasi == '1' AND $data->status_bayar == '0')
                                            <td colspan="3"><a class="btn btn-success">Telah Dikonfirmasi</a></td>
                                            <td colspan="3"><a class="btn btn-danger">Belum Dikirim</a></td>
                                            
                                            @endif


                                            @if ($data->status_konfirmasi == '1' AND $data->status_kirim == '0' AND $data->status_bayar == '1')
                                            <td colspan="3"><a class="btn btn-success">Telah Dikonfirmasi</a></td>
                                            <td colspan="3"><a class="btn btn-danger">Belum Dikirim</a></td>
                                            @endif

                                            @if ($data->status_konfirmasi == '1' AND $data->status_kirim == '1' AND $data->status_bayar == '1')
                                            <td colspan="3"><a class="btn btn-success">Sudah Dikonfirmasi</a></td>
                                            <td colspan="3"><a class="btn btn-success">Sudah Dikirim</a></td>
                                            
                                            @endif

                                            @if ($data->status_konfirmasi == '2')
                                                <td colspan="8"><center><a class="btn btn-danger">Pesanan ditolak</a></center></td> 
                                            @endif
                                        </tr>
                                        @endforeach
                                        
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
