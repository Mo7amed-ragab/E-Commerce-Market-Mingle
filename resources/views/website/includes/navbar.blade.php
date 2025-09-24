<header class="site-navbar shadow-sm">
  <div class="site-navbar-top py-2">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        {{-- Logo (Market_Mingle) on the left --}}
        <div class="col-auto order-1 order-md-1">
          <div class="site-logo">
            <a href="{{ route('home') }}" class="js-logo-clone"
              style="font-weight:bold; font-size:1.8rem; letter-spacing:1px; color:#222; text-decoration:none;">Market
              Mingle</a>
          </div>
        </div>

        {{-- User and Language on the right --}}
        <div class="col-auto order-1 order-md-1 ">
          <div class="site-top-icons">
            <ul class="list-unstyled d-flex align-items-center m-0 p-0 justify-content-end" style="gap:10px;">

              <li class="pt-2">
                <a href="{{ route('cart.view') }}" class="site-cart">
                  <span class="icon icon-shopping_cart"></span>
                  <span id="cart-item-count" class="count">{{ $cartItemCount }}</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center p-0 language-selector" href="#"
                  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @php $currentLocale = app()->getLocale(); @endphp
                  @if($currentLocale == 'ar')
                    <img src="{{ asset('assets/images/sa.png') }}" alt="AR" class="rounded flag-icon"> <span
                      class="lang-text">AR</span>
                  @else
                    <img src="{{ asset('assets/images/us.png') }}" alt="EN" class="rounded flag-icon"> <span
                      class="lang-text">EN</span>
                  @endif
                </a>
                <div class="dropdown-menu custom-anim lang-dropdown" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item d-flex align-items-center gap-2 @if($currentLocale == 'en') active-lang @endif"
                    href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                    <img src="{{ asset('assets/images/us.png') }}" alt="EN" class="rounded flag-icon"> <span
                      class="lang-text">EN</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center gap-2 @if($currentLocale == 'ar') active-lang @endif"
                    href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                    <img src="{{ asset('assets/images/sa.png') }}" alt="AR" class="rounded flag-icon"> <span
                      class="lang-text">AR</span>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center p-0 user-profile-toggle"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="User Menu">
                  @auth
                    <span class="icon icon-person me-2" style="font-size: 24px;"></span>
                    <div class="d-flex flex-column align-items-start">
                      <span class="fw-bold text-dark">{{ Auth::user()->name }}</span>
                      <!-- <small class="text-muted">{{ ucfirst(Auth::user()->user_type) }}</small> -->
                    </div>
                  @else
                    <span class="icon icon-person"></span>
                  @endauth
                </a>
                <div class="dropdown-menu dropdown-menu-right custom-anim" style="min-width:180px;">
                  @if(auth()->user())
                    <button class="dropdown-item d-flex align-items-center gap-2" type="button">
                      <i class="fa-solid fa-user-circle text-primary" style="min-width:20px;"></i>
                      {{ __('home.Profile Management') }}
                    </button>
                    @if(auth()->user()->user_type === 'admin' || auth()->user()->user_type === 'moderator')
                      <button class="dropdown-item d-flex align-items-center gap-2" type="button"
                        onclick="window.location.href='{{ route('dashboard') }}'">
                        <i class="fa-solid fa-gauge-high text-success" style="min-width:20px;"></i>
                        {{ __('home.Dashboard') }}
                      </button>
                    @endif
                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa-solid fa-sign-out-alt text-danger" style="min-width:20px;"></i> {{ __('home.Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  @else
                    <button class="dropdown-item p-3 d-flex align-items-center gap-2" type="button"
                      onclick="window.location.href='{{ route('login') }}'">
                      <i class="fa-solid fa-sign-in-alt text-info" style="min-width:20px;"></i> {{ __("home.login") }}
                    </button>
                    <button class="dropdown-item p-3 d-flex align-items-center gap-2" type="button"
                      onclick="window.location.href='{{ route('register') }}'">
                      <i class="fa-solid fa-user-plus text-success" style="min-width:20px;"></i> {{ __("home.register") }}
                    </button>
                  @endif
                </div>
              </li>


            </ul>
          </div>
          {{-- No Hamburger menu here --}}
        </div>
      </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block d-flex align-items-center justify-content-center"
          style="gap:30px;">
          <li class="nav-item"><a href="{{ route('home') }}"
              class="nav-link @if(Route::is('home')) active-nav-link @endif">{{ __('home.home') }}</a></li>
          <li class="nav-item"><a href="{{ route('about') }}"
              class="nav-link @if(Route::is('about')) active-nav-link @endif">{{ __('home.about') }}</a></li>
          <li class="nav-item"><a href="{{ route('shop') }}"
              class="nav-link @if(Route::is('shop')) active-nav-link @endif">{{ __('home.shop') }}</a></li>
          <li class="nav-item"><a href="{{ route('contactUs') }}"
              class="nav-link @if(Route::is('contactUs')) active-nav-link @endif">{{ __('home.Contact') }}</a></li>
        </ul>
      </div>
    </nav>
</header>