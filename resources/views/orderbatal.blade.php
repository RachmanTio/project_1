<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORDER PROSES</title>
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
            <li><a href="{{route('food', 0)}}">DRINK</a></li>
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
            <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
          </ul>
        </div>
      </nav>
    </section>
    <h2 class="text-center">ORDER YANG DIBATALKAN</h3>
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
                @foreach($orderList as $id => $details)
              
    

    
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

  

    // $(".update-cart").change(function (e) {

    //     e.preventDefault();

  

    //     var ele = $(this);

  

    //     $.ajax({

    //         url: '{{ route('update.cart') }}',

    //         method: "patch",

    //         data: {

    //             _token: '{{ csrf_token() }}', 

    //             id: ele.parents("tr").attr("data-id"), 

    //             quantity: ele.parents("tr").find(".quantity").val()

    //         },

    //         success: function (response) {

    //            window.location.reload();

    //         }

    //     });

    // });

  

    // $(".remove-from-favourite").click(function (e) {
    //   let rowid = $(this).attr('row-id');
    //     e.preventDefault();

  

    //     var ele = $(this);

  

    //     if(confirm("Are you sure want to remove?")) {

    //         $.ajax({

    //             url: '{{ url('remove-from-favourite') }}' + '/' + rowid,


    //             method: "post",

    //             data: {

    //                 _token: '{{ csrf_token() }}', 

    //                 id: rowid
                    

    //             },

    //             success: function (response) {

    //                 window.location.reload();

    //             }

    //         });

    //     }

    // });

  

</script>

{{-- @endsection --}}
      
    {{-- @endsection --}}
    {{-- @endforeach --}}




    </ol>
</body>
</html>