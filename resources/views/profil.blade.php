<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
      <div class="card">
        <br>
        <br>
        <img src="{{ asset('gambar') . '/' . $data->gambar }}" alt="avatar" height="150" width="300"
        class="rounded-circle img-fluid" style="width: 150px;">
        <h2 style="text-align:center">{{ $data->username }}</h2>
        <p>Email: {{ $data->email }}</p>
        <p>Alamat: {{ $data->alamat }}</p>
        <p>Date: {{ $data->tanggallahir }}</p>
        <p>Gender: {{ $data->jeniskelamin }}</p>
        <a class="btn btn-primary" href="/editProfile/{{ $data->id }}">EDIT</a>
        <br>
        <br>
        <br>
      </div>
          @auth
      @endauth
      </section>
  </body>
  </html>