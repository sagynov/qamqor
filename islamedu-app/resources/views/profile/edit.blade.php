@extends('layouts.wrap')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">{{ __('menu.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/profile">{{ __('menu.profile') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('profile.edit') }}</li>
                </ol>
                </nav>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body p-5">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mb-3">{{ __('Avatar') }}</h4>
                        <div class="mb-3">
                            <div class="mb-1">
                                <img src="{{ $profile->avatar ? asset('storage/'.$profile->avatar) : asset('storage/avatar/no-image.jpg') }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                            </div>
                            <input class="form-control form-control-sm" name="avatar" type="file" accept="image/png, image/jpeg" id="formFile">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <h4 class="mb-3">Основные информации</h4>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" placeholder="{{ __('Name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required placeholder="{{ __('Email Address') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <h4 class="mb-3">Дополнительно</h4>
                            <div class="col-md-6 mb-3">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $profile->phone }}" placeholder="{{ __('profile.phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h4 class="mb-3">Социальные сети</h4>
                            <div class="col-md-6 mb-3">
                                <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram') ?? $profile->instagram }}" placeholder="Instagram">
                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') ?? $profile->facebook }}" placeholder="Facebook">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <h4 class="mb-3">Безопасность</h4>
                            <div class="row p-0 m-0 mb-3">
                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="{{ __('Current Password') }}" autocomplete="current-password">

                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('New Password') }}" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mb-0">
                            <button type="submit" class="theme-btn btn-style-one">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection