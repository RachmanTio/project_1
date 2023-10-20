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
    </section>
    <div class="container">
		<center>
      <br>
      <br>
      <br>
			<h4>DAFTAR PENJUALAN PRODUCT</h4>
		</center>
		<a href="cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<table class='table table-bordered'>
			<thead>
				<tr>
          <th>NO</th>
					<th>No Pelanggan</th>
          <th>No Product</th>
					<th>Nama Product</th>
					<th>Harga</th>
					<th>Alamat</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($productList as $p)
                {{-- @php $total += intval($p->harga) * intval($p->qty) @endphp --}}
				<tr>
					<td>{{ $i++ }}</td>
          <td data-th="No Pelanggan">{{ $p->user_id }}</td>
                    <td data-th="No Product">{{ $p->id_product }}</td>
                    <td data-th="Nama Product">{{ $p->nama_product }}</td>
                    <td data-th="Price">Rp{{ $p->total }}</td>
                    <td data-th="Alamat">{{ $p->alamat }}</td>
				</tr>
				@endforeach
			</tbody>
            <tfoot>

                <tr>
    
                    <td colspan="5" class="text-right"><h3><strong>Total Rp{{ $total }}</strong></h3></td>
        
                </tr>
            </tfoot>
		</table>
 
	</div>
    
</body>
</html>