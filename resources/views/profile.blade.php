<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <section style="background-color: #eee;">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" >WebSiteName</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="/food">FOOD</a></li>
            <li><a href="/drink">DRINK</a></li>
            <li><a href="/profil">PROFIL</a></li>
          </ul>
          <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/favourite"><span class="glyphicon glyphicon-heart"></span></a></li>
            <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</a></li>
            <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </nav>
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
</body>
</html>