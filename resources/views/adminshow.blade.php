<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CART</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <li><a href="/profil">PROFIL</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
          </ul>
        </div>
      </nav>
    <div class="container">
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
                  <i class="fab fa-whatsapp"></i> BACK   
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
              <button type="submit" class="btn btn-warning"><i class="fa fa-user"></i> EDIT</button>
            </td>
          </form>
    </div>
    <br>
    </section>
    
</body>
</html>