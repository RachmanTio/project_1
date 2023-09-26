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
            <a class="navbar-brand" >WebSiteName</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="{{route('food', 0)}}">FOOD</a></li>
            <li><a href="/drink">DRINK</a></li>
            <li><a href="/profil">PROFIL</a></li>
          </ul>
          <form class="navbar-form navbar-left" action="#" method="GET" >
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Search" id="s_query" name="s_query">
            </div>
            <button type="button" class="btn btn-default" id="filter_btn" >Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/favourite"><span class="glyphicon glyphicon-heart"></span></a></li>
            <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</a></li>
            <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </nav>
      
      <div class="container py-5">
        <div class="row" flex-direction="row">
          @foreach ($data as $item)
          <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
            <div class="card">
              <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0">Recomend Food For You</p>
              </div>
              <img src="{{asset('')  . $item->gambar}}" alt="image" height="300" width="355 "
                class="card-img-top" alt=""  />
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="small"><a href="{{ url('products/'). '/'  .$item->id}}" class="text-muted">FOOD</a></p>
                </div>
    
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0">{{$item->nama_product}}</h5>
                  <h5 class="text-dark mb-0">{{$item->harga}}</h5>
                </div>
                <p class="btn-holder"><a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                <p class="btn-holder"><a href="{{ route('add.to.favourite', $item->id) }}" class="btn btn-info btn-block text-center" role="button">Add to favourite</a> </p>

    
                <div class="d-flex justify-content-between mb-2">
                  <div class="ms-auto text-warning">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div> 
    </section>
    <script>
      $("#multi_delete_post").on("click", function(e) {
          var checkbox = $('.checkbox');
          var idsArr = [];
          $(".checkbox:checked").each(function() {
              idsArr.push($(this).attr("data-id"));
          });
          console.log(idsArr);
          if (idsArr.length <= 0) {
              alert("Please select atleast one record to delete.");
          } else {
              if (confirm(
                      "You are about to permanently delete these items from your site.\nThis action cannot be undone\n'Cancel' to stop, 'OK' to delete."
                  )) {
                  var strIds = idsArr.join(",");
                  $.ajax({
                      url: "",
                      type: "DELETE",
                      headers: {
                          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                      },
                      data: "ids=" + strIds,
                      success: function(data) {
                          if (data["status"] == true) {
                              $(".checkbox:checked").each(function() {
                                  $(this).parents("tr").addClass(
                                      "remove_tr").fadeOut("slow");
                              });
                              //alert(data["message"]);
                              toastr.success(data.message);
                          } else {
                              alert(
                                  "Whoops Something went wrong!! \nPlease try again later..."
                              );
                              toastr.warning(data.message2);
                          }
                      },
                      error: function(data) {
                          alert(data.responseText);
                      },
                  });
              }
          }
      });


      function submit_post_filter() {
          var appUrl = {!! json_encode(url('/')) !!};
          // var s_query = '0';
          // var show_item_at_once = 0;
          // var ch_status = '3';
          var s_query = $('#s_query').val();
          var show_item_at_once = $('#show_item_at_once').val();
          var ch_status = $('#ch_status').val();
          console.log(show_item_at_once);

          if (s_query != '') {
              s_query = s_query;
          } else {
              s_query = '0';
          }

          if (show_item_at_once != '0') {
              show_item_at_once = show_item_at_once;
          } else if (show_item_at_once == '0') {
              show_item_at_once = 0;
          } else {
              show_item_at_once = 'all';
          }

          if (ch_status != '') {
              ch_status = ch_status;
          } else {
              ch_status = '3';
          }


          window.location.href = appUrl + '/food/' + '/' +s_query;
          // if (s_query != '0' || show_item_at_once == 0 || ch_status != '3') {

          // } else {
          //     window.location.href = appUrl + '/posts';
          // }
      }

      $(document).ready(function() {
          $('#filter_btn').click(function() {
              submit_post_filter();
          });

      });
      $(document).ready(function() {
          // Select/deselect all checkboxes
          $('#select_all').click(function() {
              if ($(this).is(':checked')) {
                  $('.checkbox').prop('checked', true);
              } else {
                  $('.checkbox').prop('checked', false);
              }
          });

          // If all checkboxes are selected, select the top checkbox
          $('.checkbox').click(function() {
              if ($('.checkbox:checked').length === $('.checkbox').length) {
                  $('#select_all').prop('checked', true);
              } else {
                  $('#select_all').prop('checked', false);
              }
          });
      });
  </script>
</body>
</html>
