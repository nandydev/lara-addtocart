<!DOCTYPE html>
<html>
<head>
    <title>Laravel Add To Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
  
  
    <style>
        .text-lg-start {
            color: #fff !important;
            background: #045b6c;
            text-align: left !important;
        }
        .justify-content-lg-between {
            justify-content: space-between !important;
            background: #9E9E9E;
        }
        a#logo {
            color: #fff;
            font-weight: bold;
        }
        .bg-primary {
            background-color: #045b6c !important;
        }
        button.btn.btn-success.btn-block.btn-lg.gradient-custom-4 {
            background: #045b6c;
        }
        a#logo img {
            margin-right: 5px;
        }
        .btn-outline-dark {
            color: #fff;
            border-color: #fff;
        }
        .bg-danger {
            background-color: #4CAF50 !important;
        }
        .btn-outline-danger:hover {
            color: #fff;
            background-color: #045b6c;
            border-color: #045b6c;
        }
        .btn-outline-danger {
            color: #045b6c;
            border-color: #045b6c;
        }
        .small-card {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
        }

        .small-card .card-img-top {
            max-height: 200px;
            max-width: 400px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .small-card .card-title {
            font-size: 1.1rem; /* Adjust font size for the title */
        }

        .small-card .card-text {
            font-size: 0.9rem; /* Adjust font size for the text */
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" id="logo" href="{{ url('/home') }}">
                    <img src="{{ asset('images/ecommerce.png') }}" alt="Logo" style="height: 35px; width: 35px; vertical-align: middle; border: 2px solid #fff; border-radius: 20px;">
                    SHOP NOW
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/contact') }}">Contact</a>
            </li>
        </ul>
        <form class="d-flex" id="searchForm">
            <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
        </form>
        <a class="btn btn-outline-dark ms-2" href="{{ route('shopping.cart') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
        </a>
        <ul class="navbar-nav">
        @guest
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('logout') }}">Logout</a>
            </li>
        @endguest
    </ul>
    </div>
</nav>
<div class="container mt-4">
    <h2 class="mb-3">Shopping Cart</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div> 
    @endif
    <div id="searchResults" class="row"></div>
    @yield('content')
</div>
   
@yield('scripts')

<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            let query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: "{{ url('/search') }}",
                    type: "GET",
                    data: {query: query},
                    success: function(data) {
                        $('#searchResults').empty();
                        if (data.length > 0) {
                            let resultsHtml = '';
                            $.each(data, function(index, item) {
                                resultsHtml += `
                                    <div class="col-md-3 mb-4">
                                        <div class="card">
                                            <img src="{{ asset('images') }}/${item.image}" class="card-img-top">
                                            <div class="card-body">
                                                <h4 class="card-title">${item.name}</h4>
                                                <p>${item.author}</p>
                                                <p class="card-text"><strong>Price: </strong> $${item.price}</p>
                                                <p class="btn-holder"><a href="{{ url('/book/${item.id}') }}" class="btn btn-outline-danger">Add to cart</a> </p>
                                            </div>
                                        </div>
                                    </div>`;
                            });
                            $('#searchResults').html(resultsHtml);
                        } else {
                            $('#searchResults').html('<p class="text-muted">No results found.</p>');
                        }
                    }
                });
            } else {
                $('#searchResults').empty();
            }
        });
    });
</script>

<br><br>


<!-- Footer -->

   <footer class="text-center text-lg-start text-white" style="background-color: #045b6c;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer
              content. Lorem ipsum dolor sit amet, consectetur adipisicing
              elit.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
            <p>
              <a class="text-white">MDBootstrap</a>
            </p>
            <p>
              <a class="text-white">MDWordPress</a>
            </p>
            <p>
              <a class="text-white">BrandFlow</a>
            </p>
            <p>
              <a class="text-white">Bootstrap Angular</a>
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Useful links
            </h6>
            <p>
              <a class="text-white">Your Account</a>
            </p>
            <p>
              <a class="text-white">Become an Affiliate</a>
            </p>
            <p>
              <a class="text-white">Shipping Rates</a>
            </p>
            <p>
              <a class="text-white">Help</a>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
            <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div class="p-3">
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/"
                 >MDBootstrap.com</a
                >
            </div>
            <!-- Copyright -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- Facebook -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-facebook-f"></i
              ></a>

            <!-- Twitter -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-twitter"></i
              ></a>

            <!-- Google -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-google"></i
              ></a>

            <!-- Instagram -->
            <a
               class="btn btn-outline-light btn-floating m-1"
               class="text-white"
               role="button"
               ><i class="fab fa-instagram"></i
              ></a>
          </div>
          <!-- Grid column -->
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->

<!-- End of .container -->

</body>
</html>
