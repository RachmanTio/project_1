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
          </ul>
          <ul class="nav navbar-nav">
            <li><a href="/invoice">REKAP PENDAPATAN</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
          </ul>
        </div>
      </nav>
    </section>
    <div class="container">
		<center>
			<h4>DAFTAR PENJUALAN PRODUCT</h4>
		</center>
		<br/>
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