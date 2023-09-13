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
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <!-- form validasi -->
            <form action="{{route('actionregister')}}" method="post">
                {{ csrf_field() }}
            <h2 class="text-center">FORM REGISTER USER</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-calendar"></i> Tanggal Lahir</label>
                    <input type="tanggallahir" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-venus-mars"></i> Jenis Kelamin</label>
                    <input type="text" name="jeniskelamin" class="form-control" placeholder="Jenis Kelamin" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-card"></i> Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="/login">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html>