@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(135deg, #f0f2f5 0%, #e8eaf6 100%);
    font-family: 'Roboto', sans-serif;
}

.container {
    margin-top: 100px;
}

.card {
    border: none;
    border-radius: 20px;
    background: #ffffff;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    /* transition: transform 0.3s ease, box-shadow 0.3s ease; */
}
/* 
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
} */

.card-header {
    background-color: #25a79a;
    color: white;
    text-align: center;
    font-size: 2rem;
    font-weight: 600;
    border-bottom: none;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    padding: 20px;
}

.card-body {
    padding: 3rem;
}

.btn-primary {
    background-color: #25a79a;
    border: none;
    padding: 12px 24px;
    font-size: 1.2rem;
    border-radius: 50px;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.btn-primary:hover {
    background-color: #25a79a;
    box-shadow: 0 5px 15px rgba(37,167,154,50);
}

.form-control {
    border-radius: 10px;
    border: 1px solid #ddd;
    transition: border-color 0.3s;
    padding: 12px;
}

.form-control:focus {
    border-color: #25a79a;
    box-shadow: 0 0 5px rgba(37,167,154,50);
}

.invalid-feedback {
    color: #25a79a;
    font-size: 0.9rem;
}

.btn-link {
    color: #25a79a;
    font-weight: bold;
    text-decoration: underline;
}

.btn-link:hover {
    color: #25a79a;
}

.form-check-label {
    font-size: 0.9rem;
    color: #343a40;
}

/* Responsive Enhancements */
@media (max-width: 768px) {
    .card-body {
        padding: 2rem;
    }

    .btn-primary {
        width: 100%;
        margin-top: 10px;
    }
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="user_type" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>

                            <div class="col-md-6">
                                <input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="customer" readonly>

                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
