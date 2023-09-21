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
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">KEDAI JOS</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="/food">FOOD</a></li>				
              <li><a href="/drink">DRINK</a></li>
              <li><a href="/profil">PROFIL</a></li>
              <li class="dropdown">
            </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</a></li>
              <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
              <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </nav>
        <div class="container py-5">
          <div class="row">
            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
              <div class="card">
                <div class="d-flex justify-content-between p-3">
                  <p class="lead mb-0">Recomend Food For You</p>
                </div>
                <img src="{{asset('')  . $data[0]->gambar}}" alt="image" height="300" width="300"
                  class="card-img-top" alt="" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="small"><a href="#!" class="text-muted">FOOD</a></p>
                    <p class="small text-danger"><s>Rp.22.0000</s></p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{$data[0]->nama_product}}</h5>
                    <h5 class="text-dark mb-0">{{$data[0]->harga}}</h5>
                  </div>
                  <p class="btn-holder"><a href="{{ route('add.to.cart', $data[0]->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
      
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-muted mb-0">Available: <span class="fw-bold">6</span></p>
                    <div class="ms-auto text-warning">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
              <div class="card">
                <div class="d-flex justify-content-between p-3">
                  <p class="lead mb-0">Recomend Food For You</p>
                </div>
                <img src="{{asset('')  . $data[1]->gambar}}" alt="image" height="300" width="300"
                  class="card-img-top" alt="" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="small"><a href="#!" class="text-muted">FOOD</a></p>
                    <p class="small text-danger"><s>Rp.28.000</s></p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{$data[1]->nama_product}}</h5>
                    <h5 class="text-dark mb-0">{{$data[1]->harga}}</h5>
                  </div>
                  <p class="btn-holder"><a href="{{ route('add.to.cart', $data[1]->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
      
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-muted mb-0">Available: <span class="fw-bold">7</span></p>
                    <div class="ms-auto text-warning">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
              <div class="card">
                <div class="d-flex justify-content-between p-3">
                  <p class="lead mb-0">Recomend Food For You</p>
                </div>
                <img src="{{asset('')  . $data[2]->gambar}}" alt="image" height="300" width="300"
                  class="card-img-top" alt="" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="small"><a href="#!" class="text-muted">FOOD</a></p>
                    <p class="small text-danger"><s>Rp.17.000</s></p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{$data[2]->nama_product}}</h5>
                    <h5 class="text-dark mb-0">{{$data[2]->harga}}</h5>
                  </div>
                  <p class="btn-holder"><a href="{{ route('add.to.cart', $data[2]->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
      
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-muted mb-0">Available: <span class="fw-bold">5</span></p>
                    <div class="ms-auto text-warning">
                      <i class="fa fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container py-5">
          <div class="row">
            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
              <div class="card">
                <div class="d-flex justify-content-between p-3">
                  <p class="lead mb-0">Recomend Food For You</p>
                </div>
                <img src="{{asset('')  . $data[6]->gambar}}" alt="image" height="300" width="300"
                  class="card-img-top" alt="" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="small"><a href="#!" class="text-muted">FOOD</a></p>
                    <p class="small text-danger"><s>Rp.16.0000</s></p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{$data[6]->nama_product}}</h5>
                    <h5 class="text-dark mb-0">{{$data[6]->harga}}</h5>
                  </div>
                  <p class="btn-holder"><a href="{{ route('add.to.cart', $data[6]->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
      
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-muted mb-0">Available: <span class="fw-bold">6</span></p>
                    <div class="ms-auto text-warning">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
              <div class="card">
                <div class="d-flex justify-content-between p-3">
                  <p class="lead mb-0">Recomend Food For You</p>
                </div>
                <img src="{{asset('')  . $data[7]->gambar}}" alt="image" height="300" width="300"
                  class="card-img-top" alt="" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="small"><a href="#!" class="text-muted">FOOD</a></p>
                    <p class="small text-danger"><s>Rp.48.000</s></p>
                  </div>
      
                  <div class="d-flex justify-content-between mb-3">
                    <h5 class="mb-0">{{$data[7]->nama_product}}</h5>
                    <h5 class="text-dark mb-0">{{$data[7]->harga}}</h5>
                  </div>
                  <p class="btn-holder"><a href="{{ route('add.to.cart', $data[7]->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
      
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-muted mb-0">Available: <span class="fw-bold">5</span></p>
                    <div class="ms-auto text-warning">
                      <i class="fa fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
    </section>
</body>
</html>
