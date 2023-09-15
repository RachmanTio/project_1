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
    <h1>Profil</h1>
    <p>username: {{ $data->username }}</p>
    <p>email: {{ $data->email }}</p>
    <p>tanggal lahir: {{ $data->tanggallahir }}</p>
    <p>jenis kelamin: {{ $data->jeniskelamin }}</p>
    <p>alamat: {{ $data->alamat }}</p>
    <p>gambar: {{ $data->gambar }}</p>
    @auth
<p>Welcome <b>{{ Auth::user()->name }}</b></p>
<a class="btn btn-primary" href="/login">Back</a>
<a class="btn btn-primary" href="/profile">EDIT</a>
@endauth
</body>
</html>