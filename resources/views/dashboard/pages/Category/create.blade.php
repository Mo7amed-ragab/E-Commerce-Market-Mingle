@extends('dashboard.layouts.master') 
@section('title' , __('create-dash.Card Title'))

@inject('category', 'App\Models\Category')  

@section('main-content')
    <div class="container container-custom my-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card card-custom mb-4">
                    <div class="card-header">
                        <strong class="card-title fs-2">{{ __('create-dash.Create Category') }}</strong>
                    </div>
                    <div class="card-body card-body-custom">
                        {{-- Display session messages --}}
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('success') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger text-center">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            @include('dashboard.pages.category.form')
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <button type="submit" class="btn btn-custom mb-2 mb-md-0">
                                    <i class="fas fa-save"></i> {{ __('create-dash.Submit') }}
                                </button>
                                <button type="reset" class="btn btn-custom-reset">
                                    <i class="fas fa-undo"></i> {{ __('create-dash.Reset') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
