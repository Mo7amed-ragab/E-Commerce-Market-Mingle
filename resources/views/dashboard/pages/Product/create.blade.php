@extends('dashboard.layouts.master')
@inject('product', '\App\Models\Product')
@section('title' ,  __('create-dash.Create Product'))

@section('main-content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-7"> 
            <div class="card card-custom mb-4">

                <div class="card-header">
                    <strong class="card-title fs-4">{{ __('create-dash.Create Product') }}</strong>
                </div>

                <div class="card-body card-body-custom">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('dashboard.pages.Product.form')
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-custom">{{ __('create-dash.Submit') }}</button>
                                    <button type="reset" class="btn btn-custom-reset">{{ __('create-dash.Reset') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
