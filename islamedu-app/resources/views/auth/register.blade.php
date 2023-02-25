@extends('layouts.wrap')

@section('content')

<!-- Start main-content -->
<section class="page-title" style="background-image: url(/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">Регистрация</h1>
            <ul class="page-breadcrumb">
                <li><a href="/">Главная</a></li>
                <li>Регистрация</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<section>
    <div class="container pt-70 px-5">
        <div class="section-content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mb-3">
                    <h4 class="mb-3">Основные информации</h4>
                    <div class="col-md-6 mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Name') }}" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="{{ __('Email Address') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <h4 class="mb-3">Безопасность</h4>
                    <div class="col-md-6 mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('Password') }}" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
                    </div>
                </div>
                <div class="mb-0">
                    <button type="submit" class="theme-btn btn-style-one">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
