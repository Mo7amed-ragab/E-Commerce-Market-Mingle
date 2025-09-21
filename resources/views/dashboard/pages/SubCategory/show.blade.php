@extends('dashboard.layouts.master') 

@section('title', __('show-dash.title_subCategory'))

@section('main-content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom border-light shadow-lg">
                <div class="card-header text-center">
                    <h1>{{$subCategory->id}}</h1>
                    <h2 class="mb-0">{{ $subCategory->title ?? 'No Title' }}</h2>
                </div>
                <div class="card-body">
                    <p class="card-text large-text bold-text">{{  $subCategory->description ?? 'No Description' }}</p>
                    <h4>{{ $subCategory->create_user->name ?? 'No Admin Name' }}</h4> 
                    <h5>{{ $subCategory->category->title ?? 'No Category' }}</h5>
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-secondary btn-custom3" href="{{ route('subcategories.edit',  $subCategory->id) }}">
                            <i class="fa-solid fa-edit"></i>{{ __('show-dash.Edit') }}  
                        </a>

                        <form action="{{ route('subcategories.destroy',  $subCategory->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-custom3" type="submit">
                                <i class="fa-solid fa-trash-alt"></i> {{ __('show-dash.Delete') }} 
                            </button>
                        </form>

                        <a class="btn btn-outline-primary btn-custom3" href="{{ route('subcategories.index') }}">
                            <i class="fa-solid fa-arrow-left"></i>  {{ __('show-dash.Return to subCategories') }} 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
