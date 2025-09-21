@extends('dashboard.layouts.master')
@section('title',  __('edit-dash.Edit Product'))
@section('main-content')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom mb-4">
                
                <div class="card-header">
                    <strong class="card-title fs-2"> {{ __('edit-dash.Edit Product') }}({{ $product->title }})</strong>
                </div>
                
                <div class="card-body card-body-custom">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        @include('dashboard.pages.Product.form')
                        
                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-md px-4 font-weight-bold fs-5 btn-custom2">{{ __('edit-dash.update_button') }}</button>
                            <div>
                                <a href="{{ route('products.index') }}" class="btn btn-md px-2 py-2 btn-custom2-reset">{{ __('edit-dash.Return to Products') }}</a>
                                <a href="{{ url()->previous() }}" class="btn btn-md px-2 py-2 btn-custom2-go">{{ __('edit-dash.back_button') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
