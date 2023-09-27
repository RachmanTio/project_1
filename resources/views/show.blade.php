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
    <div class="container">
        <div class="row" >
            <div class="col-md-6" >
                <img src="{{asset('')  . $product->gambar}}" alt="{{$product->nama_product}}" height="300" width="400" class="img-fluid" >
            </div>
            <div class="col-md-6">
                <h1>{{$product->nama_product}}</h1>
                {{-- <p class="text-muted">Kategori: {{ $product->category }}</p> --}}
                <h3 class="text-success">Rp {{$product->harga}}</h3>
                <p>{{$product->deskripsi}}</p>
                <div class="mt-4">
                  <a class="btn btn-warning btn-md"
                  href="{{ route('add.to.cart', $product->id) }}" role="button">
                  <i class="fab fa-whatsapp"></i> Add To Cart    
                  </a>
                  <a class="btn btn-info btn-md"
                  href="{{ route('add.to.favourite', $product->id) }}" role="button">
                  <i class="fab fa-whatsapp"></i> Add To Favourite    
                  </a>
                  <a class="btn btn-success btn-md"
                  href="/food/0" role="button">
                  <i class="fab fa-whatsapp"></i> BACK   
                  </a>  
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <br>
    </section>
    
</body>
</html>