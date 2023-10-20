<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
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