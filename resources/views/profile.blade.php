<!DOCTYPE html>
<html lang="en">
<head>
     {{--  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  --}}
    <title>HOME</title>
    {{--  <link rel="stylesheet" href="{{ asset('css/p.css') }}">  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
        integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <section style="background-color: #eee;">
        <nav class="navbar navbar-expand-md navbar-light bg-success fixed-top">

            <a class="nav-link text-light font-weight-bold px-3">CAFE BAROKAH</a>

            <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-between" id="nav">

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link text-light font-weight-bold px-3" href="/profil">Profil</a>

                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-light font-weight-bold px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('food', 0)}}">Food</a>
                        <a class="dropdown-item" href="{{route('drink', 0)}}">Drink</a>
                        <a class="dropdown-item" href="/favourite">Favourite</a>
                        <a class="dropdown-item" href="/cart">Keranjang</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/login">LogOut</a>
                      </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light font-weight-bold px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Status
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/orderproses">Proses</a>
                          <a class="dropdown-item" href="/orderkirim">Dikirim</a>
                          <a class="dropdown-item" href="/orderselesai">Selesai</a>
                          <a class="dropdown-item" href="/orderbatal">Batal</a>
                          <div class="dropdown-divider"></div>
                        </div>
  
                      </li>
                 
                </ul>


                <!-- Search bar -->

                <form class="form-inline ml-3" action="#" method="GET">

                    <div class="from-group">

                        <input type="text" class="form-control " placeholder="Search" id="s_query" name="s_query">

                        <button type="submit"><i class="fa fa-search"></i></button>

                    </div>

                </form>

            </div>

        </nav>
    </section>
        <br>
        <br>
    
        <div class="container" style="background-color: #eee;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Upload File or Images') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user_profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="gambar" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-user"></i> Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-envelope"></i> Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" >
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-venus-mars"></i> Gender</label>
                                    <input type="radio" name="jeniskelamin" value="Laki Laki" class="" placeholder="Jenis Kelamin" >Laki Laki
                                    <input type="radio" name="jeniskelamin" value="Perempuan" class="" placeholder="Jenis Kelamin" >Perempuan
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-address-card"></i> Tanggal Lahir</label>
                                    <input type="date" name="tanggallahir" class="form-control" placeholder="Alamat" >
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-address-card"></i> Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" >
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Upload') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>