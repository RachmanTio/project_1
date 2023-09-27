<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section style="background-color: #eee;">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" >WebSiteName</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="{{route('food', 0)}}">FOOD</a></li>
            <li><a href="{{route('drink', 0)}}">DRINK</a></li>
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
            <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
          </ul>
        </div>
      </nav>
          <section style="background-color: #eee;">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <img src="{{ asset('gambar') . '/' . $data->gambar }}" alt="avatar" height="150" width="300"
                        class="rounded-circle img-fluid" style="width: 150px;">
                      <h5 class="my-3">{{ $data->username }}</h5>
                      <p class="text-muted mb-1">CUSTOMER</p>
                      <p class="text-muted mb-4">DOMISILI, {{ $data->alamat }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Username</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $data->username }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $data->email }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Date</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $data->tanggallahir }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $data->jeniskelamin }}</p>
                        </div>
                      </div>
                      <hr>
                      </div>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        @auth
    <a class="btn btn-primary" href="/profile">EDIT</a>
    @endauth
    </section>
</body>
</html>