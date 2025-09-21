@extends('layouts.app')

@section('content')

<style>
body {
    background: linear-gradient(135deg, #f0f2f5 0%, #e8eaf6 100%);
    font-family: 'Roboto', sans-serif;
}

.container {
    margin-top: 80px;
}

.card {
    border: none;
    border-radius: 20px;
    background: #ffffff;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    /* transition: transform 0.3s ease, box-shadow 0.3s ease; */
}

/* .card:hover {
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
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="col-form-label">{{ __('Email Address Or Username') }}<span class="text-danger fs-4">*</span></label>
                            <div>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="col-form-label">{{ __('Password') }}<span class="text-danger fs-4">*</span></label>
                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
