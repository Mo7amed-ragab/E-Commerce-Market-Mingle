<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Market Mingle | @yield('title', 'Shop for Everything')</title>
  <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/Favicon.ico-removebg-preview.png') }}" />

  {{-- links shpoper them --}}
  <link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"> {{-- Custom styles --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- Toastr CSS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  {{-- ar --}}
  @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('assets/css/rtl.css')}}">
  @endif


</head>

<body>
  {{-- navbar include --}}
  @include('website.includes.navbar')
  {{-- Main content --}}
  <main id="main" class="main">
    @section('main-content')
    @show
  </main>
  {{-- footer include --}}
  @include('website.includes.footer')


  {{-- scribt shopper --}}

  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/js/aos.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script> {{-- Custom scripts --}}

  {{-- Toastr JS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  @stack('scripts')

  <script>
    $(document).ready(function () {
      // Configure Toastr options
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right", // Reverted to bottom-right
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };

      // Function to update cart item count in the navbar (global)
      window.updateCartItemCount = function () {
        $.ajax({
          type: "GET",
          url: "{{ route('cart.count') }}",
          success: function (response) {
            $('#cart-item-count').text(response.count);
          },
          error: function (response) {
            console.log('Error fetching cart item count:', response);
          }
        });
      };

      // Initial update of cart count on page load
      updateCartItemCount();
    });
  </script>
</body>

</html>