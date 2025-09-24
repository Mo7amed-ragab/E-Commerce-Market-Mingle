@extends('website.layouts.master')

@section('title', __('about.title'))

@section('main-content')

  <div class="site-wrap">

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="{{ route('home') }}">{{ __('about.home') }}</a>
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
              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">{{ $page->title }}</h2>
            </div>
            <div>
              {!! $page->content !!}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection