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
      
      <div class="container py-5">
        <div class="row" flex-direction="row">
          @foreach ($data as $item)
          <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
            <div class="card">
              <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0">Recomend Food For You</p>
              </div>
              <img src="{{asset('')  . $item->gambar}}" alt="image" height="300" width="355"
                class="card-img-top" alt="" />
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


          window.location.href = appUrl + '/drink/' + '/' +s_query;
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