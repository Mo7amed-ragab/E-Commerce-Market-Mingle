@extends('website.layouts.master')

@section('title' , __('about.title'))

@section('main-content')

<div class="site-wrap">

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="index.html">{{ __('about.home') }}</a>
          <span class="mx-2 mb-0">/</span>
          <strong class="text-black">{{ __('about.about') }}</strong>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section border-bottom" data-aos="fade">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6">
          <div class="block-16">
            <figure>
              <img src="{{ asset('assets/images/blog_1.jpg') }}" alt="Image placeholder" class="img-fluid rounded">
              <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo">
                <span class="ion-md-play"></span>
              </a>
            </figure>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <div class="site-section-heading pt-3 mb-4">
            <h2 class="text-black">{{ __('about.how_we_started') }}</h2>
          </div>
          <p>{{ __('about.description_1') }}</p>
          <p>{{ __('about.description_2') }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section border-bottom" data-aos="fade">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>{{ __('about.the_team') }}</h2>
        </div>
      </div>

      <div class="row">
        @foreach(__('about.team_members') as $member)
          <div class="col-md-6 col-lg-4">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="{{ asset('assets/images/' . $member['image']) }}" alt="Image placeholder" class="mb-4">
                  <h3 class="block-38-heading h4">{{ $member['name'] }}</h3>
                  <p class="block-38-subheading">{{ $member['position'] }}</p>
                </div>
                <div class="block-38-body">
                  <p>{{ $member['description'] }}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
          <div class="icon mr-4 align-self-start">
            <span class="icon-truck"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">{{ __('about.free_shipping') }}</h2>
            <p>{{ __('about.free_shipping_desc') }}</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
          <div class="icon mr-4 align-self-start">
            <span class="icon-refresh2"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">{{ __('about.free_returns') }}</h2>
            <p>{{ __('about.free_returns_desc') }}</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
          <div class="icon mr-4 align-self-start">
            <span class="icon-help"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">{{ __('about.customer_support') }}</h2>
            <p>{{ __('about.customer_support_desc') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
