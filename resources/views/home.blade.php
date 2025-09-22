@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover" data-aos="fade">
        <div class="container">
            <div class="row align-items-start justify-content-center justify-content-md-end">
                <div class="col-sm-offset-6 col-sm-6 text-center text-sm-right">
                    <span class="d-inline-block text-white mb-4" data-aos="fade-right">{{ __('home.big_sale') }}</span>
                    <h2 class="text-white font-weight-light mb-4" data-aos="fade-right" data-aos-delay="100">
                        {{ __('home.discount') }}
                    </h2>
                    <p class="mb-4" data-aos="fade-right" data-aos-delay="200">
                        <a href="#" class="btn btn-primary btn-sm">{{ __('home.shop_now') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('home.free_shipping') }}</h2>
                        <p>{{ __('home.free') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('home.free_returns') }}</h2>
                        <p>{{ __('home.returns') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('home.customer_support') }}</h2>
                        <p>{{ __('home.customer') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection