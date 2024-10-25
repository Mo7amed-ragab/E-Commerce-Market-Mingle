<header class="site-navbar" @if(Route::is('login') || Route::is('register')) role="banner" @endif>
  <div class="site-navbar-top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
          <form action="" class="site-block-top-search">
            <span class="icon icon-search2"></span>
            <input type="text" class="form-control border-0" placeholder="{{ __("home.Search") }}">
          </form>
        </div>
        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
          <div class="site-logo">
            <a href="{{ route('home') }}" class="js-logo-clone">{{ __("home.Shoppers") }}</a>
          </div>
        </div>
        
        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
          <div class="site-top-icons">
            <ul>
              @auth
                <li><a href="javascript:void(0)" class="text-decoration-none">{{ auth()->user()->name }}</a></li>
              @else
              <li><a class="text-decoration-none">{{ __('home.guest') . '_' . uniqid() }}</a></li>
              @endauth
              
              @auth
                @if(auth()->user()->user_type === 'customer')
                <li><a href="#" class="text-decoration-none"><span class="icon icon-heart-o"></span></a></li>
                <li>
                  <a href="cart.html" class="site-cart">
                    <span class="icon icon-shopping_cart"></span>
                    <span class="count">4</span>
                  </a>
                </li>
                @endif
              @endauth
              

              
              <li class="dropdown">
                <a class="dropdown-toggle p-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="User Menu">
                  <span class="icon icon-person"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(auth()->user())
                    <button class="dropdown-item" type="button">
                      <i class="fa-solid fa-user"></i> {{ __('home.Profile Management') }}
                    </button>
                    @if(auth()->user()->user_type === 'admin' || auth()->user()->user_type === 'moderator')
                    <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('dashboard') }}'">
                      <i class="fa-solid fa-user"></i> {{ __('home.Dashboard') }}
                    </button>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa-solid fa-sign-out-alt"></i> {{ __('home.Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  @else
                    <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('login') }}'">{{ __("home.login") }}</button>
                    <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('register') }}'">{{ __("home.register") }}</button>
                  @endif
                </div>
              </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-globe"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">  <i class="fas fa-text-height"> </i> <strong> عربي</strong>
            </a>
             <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}"> <i class="fas fa-font"></i><strong> {{ __('home.English') }}</strong> </a>
          </div>
        </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
      <ul class="site-menu js-clone-nav d-none d-md-block">
        <li>
          <a href="{{ route('home') }}">{{ __('home.home') }}</a>
          {{-- <ul class="dropdown">
            <li><a href="#">{{ __('home.Menu one') }}</a></li>
            <li><a href="#">{{ __('home.Menu two') }}</a></li>
            <li><a href="#">{{ __('home.Menu three') }}</a></li>
            <li class="has-children">
              <a href="#">{{ __('home.Sub Menu') }}</a>
              <ul class="dropdown">
                <li><a href="#">{{ __('home.Menu one') }}</a></li>
                <li><a href="#">{{ __('home.Menu two') }}</a></li>
                <li><a href="#">{{ __('home.Menu three') }}</a></li>
              </ul>
            </li>
          </ul> --}}
        </li>
        <li>
          <a href="{{ route('about') }}">{{ __('home.about') }}</a>
          {{-- <ul class="dropdown">
            <li><a href="#">{{ __('home.Menu one') }}</a></li>
            <li><a href="#">{{ __('home.Menu two') }}</a></li>
            <li><a href="#">{{ __('home.Menu three') }}</a></li>
          </ul> --}}
        </li>
        <li><a href="{{ route('shop') }}">{{ __('home.shop') }}</a></li>
        {{-- <li><a href="#">{{ __('home.category') }}</a></li>
        <li><a href="#">{{ __('home.newArrivals') }}</a></li> --}}
        <li><a href="{{ route('contactUs') }}">{{ __('home.Contact') }}</a></li>
      </ul>
    </div>
  </nav>
</header>
