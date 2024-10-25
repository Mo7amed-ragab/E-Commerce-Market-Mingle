@extends('dashboard.layouts.master') 
@section('title')
    Create User
@endsection

@inject('user', 'App\Models\User')  

@section('main-content')

<div class="container container-custom my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card card-custom mb-4">
                
                <div class="card-header">
                    <strong class="card-title fs-2">Create User</strong>
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

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        @include('dashboard.pages.User.form')
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
