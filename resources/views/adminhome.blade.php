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
            <a class="navbar-brand" >Admin Home</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="/adminhome">FOOD</a></li>
            {{-- <li><a href="/profil">PROFIL</a></li> --}}
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
          </ul>
        </div>
      </nav>
      <div class="container py-5">
        <h2 class="text-center">ORDER YANG MASUK</h3>
        <div class="row" flex-direction="row">
          @foreach ($data as $item)
          <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
            <div class="card">
              <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0"></p>
              </div>
              <div class="row">
                <h5 class="mb-0">STATUS {{$item->statusproduct}}</h5>
              </div>
              <img src="{{asset('')  . $item->gambar}}" alt="image" height="300" width="355 "
                class="card-img-top" alt=""  />
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="small"><a href="{{ url('order/'). '/'  .$item->id}}" class="text-muted">BERI STATUS</a></p>
                </div>
    
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0">{{$item->nama}}</h5>
                  <h5 class="text-dark mb-0">{{$item->totalharga}}</h5>
                  <h5 class="text-dark mb-0">USER ID:{{$item->user_id}}</h5>
                </div>
              <br>
                


    
                <div class="d-flex justify-content-between mb-2">
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
          @endforeach
        </div>
      </div> 
      <br>
    </section>
</body>
</html>
