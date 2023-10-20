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

            <a class="nav-link text-light font-weight-bold px-3">Anda Admin</a>

            <ul class="navbar-nav">

              <li class="nav-item">

                  <a class="nav-link text-light font-weight-bold px-3" href="{{route('logout')}}">LogOut</a>

              </li>
              <li class="nav-item">
                <a class="nav-link text-light font-weight-bold px-3" href="/invoice">REKAP PENDAPATAN</a>
              </ul>

        </nav>
      <div class="container py-5">
        <br>
        <h2 class="text-center">ORDER YANG MASUK</h3>
          <br>
        <div class="row" flex-direction="row">
          @foreach ($data as $item)
          <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
            <div class="card">
              {{--  <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0"></p>
              </div>
              <div class="row">
                <h5 class="mb-0">STATUS {{$item->status}}</h5>
              </div>  --}}
                <div class="d-flex justify-content-between p-3">
                    <p class="lead mb-0">
                      <h5 class="mb-0">STATUS {{$item->statusproduct}}</h5>
                    </p>
                </div>
              <img src="{{asset('')  . $item->gambar}}" alt="image" height="300" width="355 "
                class="card-img-top" alt=""  />
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="small"><a href="{{ url('order/'). '/'  .$item->id}}" class="text-muted">BERI STATUS</a></p>
                </div>
    
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0">{{$item->nama}}</h5>

              </div>
              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0">{{$item->totalharga}}</h5>

            </div>
            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0">USER ID:{{$item->user_id}}</h5>

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
