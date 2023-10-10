<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME</title>
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
            <a class="nav-link text-light font-weight-bold px-3">CAFE BAROKAH</a>
            <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light font-weight-bold px-3" href="/profil">Profil</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-light font-weight-bold px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('food', 0)}}">Food</a>
                        <a class="dropdown-item" href="{{route('drink', 0)}}">Drink</a>
                        <a class="dropdown-item" href="/favourite">Favourite</a>
                        <a class="dropdown-item" href="/cart">Keranjang</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/login">LogOut</a>
                      </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light font-weight-bold px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Status
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/orderproses">Proses</a>
                          <a class="dropdown-item" href="/orderkirim">Dikirim</a>
                          <a class="dropdown-item" href="/orderselesai">Selesai</a>
                          <a class="dropdown-item" href="/orderbatal">Batal</a>
                          <div class="dropdown-divider"></div>
                        </div>
                      </li>
                </ul>


                <!-- Search bar -->

                <form class="form-inline ml-3" action="#" method="GET">
                    <div class="from-group">
                        <input type="text" class="form-control " placeholder="Search" id="s_query" name="s_query">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </nav>
    </section>
    <br>
    <br>
    <br>
    <br>
    <h2 class="text-center">ORDER DALAM PROSES</h2>
    <br>
    <ol>
      {{-- @foreach ($productList as $data) --}}
    {{-- @section('content') --}}
      <table id="favourite" class="table table-hover table-condensed">

        <thead>
    
            <tr>
    
                <th style="width:70%">Product</th>
    
                <th style="width:30%">Price</th>
    
                <th style="width:10%"></th>
    
            </tr>
    
          </thead>
          <tbody>
            @php $total = 0 @endphp

            {{-- @if(session('orderproses')) --}}
    
                {{-- @foreach(session('cart') as $id => $details) --}}
                @foreach($orderList as $id => $details)
              
    
                    {{-- @php $total += intval($details->total) * intval($details->qty) @endphp --}}
    
                    <tr data-id="{{ $id }}">
    
                        <td data-th="Product">
    
                            <div class="row">
    
                                <div class="col-sm-3 hidden-xs"><img src="{{asset('')  . $details->gambar }}" width="100" height="50" class="img-responsive"/></div>
    
                                <div class="col-sm-9">
    
                                    <h4 class="nomargin">{{ $details->nama_product }}</h4>
    
                                </div>
    
                            </div>
    
                        </td>
    
                        <td data-th="Price">Rp{{ $details->total}}</td>
    
                    </tr>
    
                @endforeach
            {{-- @endif --}}
          </tbody>
          <tfoot>
    
            <tr>
    
                <td colspan="5" class="text-right">
    
                    {{-- <a href="{{ url('/food/0') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a> --}}
        
                </td>
    
            </tr>
        </tfoot>
        </table>
        {{-- @section('scripts') --}}

<script type="text/javascript">

  


</script>

{{-- @endsection --}}
      
    {{-- @endsection --}}
    {{-- @endforeach --}}




    </ol>
</body>
</html>