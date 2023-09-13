<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Password User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="row">
        <div class="col-md-6">
            @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <form action="{{ route('password.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" />
                </div>
                <div class="mb-3">
                    <label>New Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="new_password" />
                </div>
                <div class="mb-3">
                    <label>New Password Confirmation<span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="new_password_confirmation" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Change</button>
                    <a class="btn btn-danger" href="/login">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>