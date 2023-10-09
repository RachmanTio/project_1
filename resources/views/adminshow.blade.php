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

            <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">

                <span class="navbar-toggler-icon"></span>

            </button>

        </nav>
    <div class="container">
      <br>
      <br>
      <br>
      <br>
      <form action="{{route('actionstatus')}}">
        <div class="row" >
            <div class="col-md-6" >
                <img src="{{asset('')  . $order->gambar}}" alt="{{$order->nama}}" height="300" width="400" class="img-fluid" >
            </div>
            <div class="col-md-6">
                <h1>{{$order->nama}}</h1>
                {{-- <p class="text-muted">Kategori: {{ $order->category }}</p> --}}
                <h3 class="text-success">Rp {{$order->total}}</h3>
                <p>USER ID :{{$order->user_id}}</p>
                <div class="mt-4">
                  <a class="btn btn-success btn-md"
                  href="/adminhome" role="button">
                  <i></i> BACK   
                  </a>  
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="container mt-3">
          <input type="hidden" name="id" value="{{$order->id}}">
          <h2>Select Status</h2>
          <p>Pilihlah status order saat ini</p>
          
            <label for="sel1" class="form-label">Select Status (select one):</label>
            <select class="form-select" id="sel1" name="sellist1">
              <option>di proses</option>
              <option>di kirim</option>
            </select>
            <td colspan="5" class="text-right" >
              <button type="submit" class="btn btn-warning"><i></i> EDIT</button>
            </td>
          </form>
    </div>
    <br>
    </section>
    
</body>
</html>