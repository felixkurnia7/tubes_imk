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
            <a class="navbar-brand ps-3" href="/admin/dashboard">Dila F-fashion</a>
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
                            <a class="nav-link" href="/admin/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">User</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/admin/user">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                        Daftar User</a>
                                </nav>
                            </div>
                            
                            
                            <div class="sb-sidenav-menu-heading">Barang</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Barang
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/admin/barang(jual)">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Daftar Barang (Jual)</a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/admin/barang(sewa)">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Daftar Barang (Sewa)</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Pesanan</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pesanan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/admin/pesanan(jual)">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Pesanan Barang (Jual)</a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/admin/pesanan(sewa)">
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
                        <h1 class="mt-4">Tambah Barang (Jual)</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <form action="/admin/barang(jual)/tambah/barang/" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><input name="nama"></td>
                                        </tr>
                                        @if ($errors->has('nama'))
                                        <tr>
                                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                                            <br>
                                        </tr>@endif
                                        <tr>
                                            <td>Stock</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><input type="number" name="stok"></td>
                                        </tr>
                                        @if ($errors->has('stok'))
                                        <tr>
                                            <span class="text-danger">{{ $errors->first('stok') }}</span>
                                            <br>
                                        </tr>@endif
                                        <tr>
                                            <td>Ukuran</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><textarea name="ukuran" cols="23" rows="5"></textarea></td>
                                        </tr>
                                        @if ($errors->has('ukuran'))
                                        <tr>
                                            <span class="text-danger">{{ $errors->first('ukuran') }}</span>
                                            <br>
                                        </tr>@endif
                                        <tr>
                                            <td>Warna</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><textarea name="warna" cols="23" rows="3"></textarea></td>
                                        </tr>
                                        @if ($errors->has('warna'))
                                        <tr>
                                            <span class="text-danger">{{ $errors->first('warna') }}</span>
                                            <br>
                                        </tr>@endif
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><input type="number" name="harga"></td>
                                        </tr>
                                        @if ($errors->has('harga'))
                                        <tr>
                                            <span class="text-danger">{{ $errors->first('harga') }}</span>
                                            <br>
                                        </tr>@endif
                                        <tr>
                                            <td>Gambar</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><input type="file" name="gambar"></td>
                                        </tr>
                                        @if ($errors->has('gambar'))
                                        <tr>
                                            <span class="text-danger">{{ $errors->first('gambar') }}</span>
                                            <br>
                                        </tr>@endif
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>&nbsp;</td>
                                            <td><button type="submit" class="btn btn-success">Tambah</button></td>
                                        </tr>
                                    </table>
                                </form>
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
