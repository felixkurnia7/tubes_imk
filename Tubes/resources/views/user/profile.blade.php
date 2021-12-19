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
                
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                        
                    <div class="send-message">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="section-heading">
                                <h1>Profile User</h1>
                              </div>
                            </div>
                            <div class="row">&NonBreakingSpace;</div>
                            <div class="col-md-8">
                              <div class="contact-form">
                                <form action="/user/profile/edit/{{Auth::user()->id}}" method="POST">
                                    
                                  <div class="row">
                                    @csrf
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <fieldset>
                                        <a> &NonBreakingSpace; Nama </a>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" value="{{Auth::user()->name}}">
                                      </fieldset>
                                      @if ($errors->has('nama'))
                                        
                                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                                            <br>
                                        @endif
                                    </div>
                                    <div class="row">&NonBreakingSpace;</div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <fieldset>
                                        <a> &NonBreakingSpace; Email </a> 
                                        <input disabled name="email" type="text" class="form-control" placeholder="Alamat E-mail" value="{{Auth::user()->email}}">
                                      </fieldset>
                                      @if ($errors->has('email'))
                                        
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            <br>
                                        @endif
                                    </div>
                                    <div class="row">&NonBreakingSpace;</div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <fieldset>
                                        <a> &NonBreakingSpace; Alamat </a> 
                                        <input name="alamat" type="text" class="form-control" placeholder="Alamat Lengkap" value="{{Auth::user()->alamat}}">
                                      </fieldset>
                                      @if ($errors->has('alamat'))
                                        
                                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                                <br>
                                        @endif
                                    </div>
                                    <div class="row">&NonBreakingSpace;</div>
                                    <div class="col-lg-12">
                                      <fieldset>
                                        <a> &NonBreakingSpace; Nomor Telephone </a>
                                        <input name="no_hp" class="form-control" placeholder="Nomor Telepon" value="{{Auth::user()->no_hp}}">
                                      </fieldset>
                                      @if ($errors->has('no_hp'))
                                    
                                          <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                          <br>
                                      @endif
                                    </div>
                                    <div class="row">&NonBreakingSpace;</div>
                                    <div class="col-lg-12">
                                      <fieldset>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                      </fieldset>
                                    </div>
                                  </div>
                                </form>
                                <form action="/user/change_password">
                                  <div class="row">&NonBreakingSpace;</div>
                                  <div class="col-lg-12">
                                    <fieldset>
                                      <button type="submit" class="btn btn-primary"><a style="color: white">Change Password</a></button>
                                    </fieldset>
                                  </div>
                                  </div>
                                  </form>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                </main>
                
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
