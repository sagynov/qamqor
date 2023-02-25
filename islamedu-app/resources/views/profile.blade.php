@extends('layouts.wrap')

@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">{{ __('menu.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('menu.profile') }}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <img src="{{ $profile->avatar ? asset('storage/'.$profile->avatar) : asset('storage/avatar/no-image.jpg') }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ $user->name }}</h5>
            @if(count($roles) > 0)
                @foreach($roles as $role)
                    <p class="text-muted mb-1">{{ __('profile.roles.'.$role->name) }}</p>
                @endforeach
                <p class="mb-3"></p>
            @else
            <p class="text-muted mb-4">{{ __('profile.roles.subscriber') }}</p>
            @endif
            <div class="d-flex justify-content-center mb-2">
              <a class="btn btn-outline-primary ms-1" href="/profile/edit">{{ __('profile.edit') }}</a>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('profile.name') }}</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('profile.email') }}</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('profile.phone') }}</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->phone ?? __('profile.not_specified') }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <div class="col-sm-3">
                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                </div>
                <div class="col-sm-9">
                    <p class="mb-0">{{ $profile->instagram ?? __('profile.not_specified') }}</p>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <div class="col-sm-3">
                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                </div>
                <div class="col-sm-9">
                    <p class="mb-0">{{ $profile->facebook ?? __('profile.not_specified') }}</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection