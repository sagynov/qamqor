{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- Courses -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('course-category') }}"><i class="nav-icon la la-stream"></i> {{ __('course.category.plural') }} </a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('course-item') }}"><i class="nav-icon la la-graduation-cap"></i> {{ __('course.item.plural') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('course-video') }}"><i class="nav-icon la la-video"></i> {{ __('course.video.plural') }}</a></li>

<!-- Users -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-users"></i> {{ __('user.plural') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>{{ __('Roles') }}</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>{{ __('Permissions') }}</span></a></li>