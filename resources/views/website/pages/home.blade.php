@extends('website.layouts.master')

@section('title' ,__('home.home'))

@section('main-content')
    <style>
        .slider::before{
            content: "";
            background: rgba(0, 0, 0, 0.3);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }
    </style>
    <div class="site-wrap">
        <div class="site-blocks-cover slider position-relative" style="background-image: url({{ asset('assets/images/bg_img5.jpg')}});" data-aos="fade">
            <div class="container">
                <div class="row align-items-start align-items-md-center justify-content-end" dir="{{ app()->getLocale() == 'ar' ? 'ltr' : 'ltr' }}">
                    <div class="col-md-5 text-center text-md-left pt-5 pt-md-0" >
                        <h1 class="mb-2 text-white">{{ __('home.title') }}</h1>
                        <div class="intro-text text-center text-md-left">
                            <p class="mb-4" style="font-weight: bold; color:#fff">{{ __('home.text')}}</p>

                            <p>
                                <a href="#" class="btn btn-sm btn-primary">{{ __('home.shop_now')}}</a>
                            </p>
                        </div>
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
                    <h2 class="text-uppercase">{{__('home.free_shipping')}}</h2>
                    <p>{{__('home.free')}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                    <h2 class="text-uppercase">{{__('home.free_returns')}}</h2>
                    <p>{{__('home.returns')}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                    <span class="icon-help"></span>
                    </div>
                    <div class="text">
                    <h2 class="text-uppercase">{{__('home.customer_support')}}</h2>
                    <p>{{__('home.customer')}}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-blocks-2">
        <div class="container">
            <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="#">
                <figure class="image">
                    <img src="{{asset('assets/images/women.jpg')}}" alt="" class="img-fluid">
                </figure>
                <div class="text">
                    <span class="text-uppercase">{{ __('home.collections') }}</span>
                    <h3>{{__('home.Women')}}</h3>
                </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                <a class="block-2-item" href="#">
                <figure class="image">
                    <img src="{{asset('assets/images/children.jpg')}}" alt="" class="img-fluid">
                </figure>
                <div class="text">
                    <span class="text-uppercase">{{ __('home.collections') }}</span>
                    <h3> {{__('home.Children')}} </h3>
                </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                <a class="block-2-item" href="#">
                <figure class="image">
                    <img src="{{asset('assets/images/men.jpg')}}" alt="" class="img-fluid">
                </figure>
                <div class="text">
                    <span class="text-uppercase">{{ __('home.collections') }}</span>
                    <h3>{{__('home.Men')}} </h3>
                </div>
                </a>
            </div>
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>{{ __('home.Featured_Products') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{asset('assets/images/cloth_1.jpg')}}" alt="{{ __('home.tank_top') }}" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{ __('home.TankTop') }}</a></h3>
                                    <p class="mb-0">{{ __('home.finding_perfect_tshirt') }}</p>
                                    <p class="text-primary font-weight-bold">${{ __('home.price') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{asset('assets/images/shoe_1.jpg')}}" alt="{{ __('home.corater') }}" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{ __('home.corater') }}</a></h3>
                                    <p class="mb-0">{{ __('home.finding_perfect_products') }}</p>
                                    <p class="text-primary font-weight-bold">${{ __('home.price') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{asset('assets/images/cloth_2.jpg')}}" alt="{{ __('home.polo_shirt') }}" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{ __('home.polo_shirt') }}</a></h3>
                                    <p class="mb-0">{{ __('home.finding_perfect_products') }}</p>
                                    <p class="text-primary font-weight-bold">${{ __('home.price') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{asset('assets/images/cloth_3.jpg')}}" alt="{{ __('home.tshirt_mockup') }}" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{ __('home.tshirt_mockup') }}</a></h3>
                                    <p class="mb-0">{{ __('home.finding_perfect_products') }}</p>
                                    <p class="text-primary font-weight-bold">${{ __('home.price') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{asset('assets/images/shoe_1.jpg')}}" alt="{{ __('home.corater') }}" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{ __('home.corater') }}</a></h3>
                                    <p class="mb-0">{{ __('home.finding_perfect_products') }}</p>
                                    <p class="text-primary font-weight-bold">${{ __('home.price') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-8">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>{{ __('home.big_sale') }}</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 mb-5">
                    <a href="#"><img src="{{asset('assets/images/blog_1.jpg')}}" alt="{{ __('home.big_sale') }}" class="img-fluid rounded"></a>
                </div>
                <div class="col-md-12 col-lg-5 text-center pl-md-5">
                    <h2><a href="#">{{ __('home.discount_offer') }}</a></h2>
                    <p class="post-meta mb-4">{{ __('home.author', ['author' => 'Carl Smith']) }} <span class="block-8-sep">&bullet;</span> {{ __('home.date') }}</p>
                    <p>{{ __('home.description') }}</p>
                    <p><a href="#" class="btn btn-primary btn-sm">{{ __('home.shop_now') }}</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
