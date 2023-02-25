@extends('layouts.wrap')

@section('content')

<!-- Start main-content -->
<section class="page-title" style="background-image: url(/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $courseItem->title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/home">Главная</a></li>
                <li><a href="{{ route('course-category.show', ['course_category' => $category]) }}">{{ $category->title }}</a></li>
                <li>{{ $courseItem->title }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!--Start courses Details-->
<section class="course-details">
    <div class="container">
        @can('view courses')
        <div class="row flex-xl-row-reverse">
            <!--Start courses Details Content-->
            <div class="col-xl-8 col-lg-8">
                <div class="courses-details__content">
                    <img src="{{ asset('storage/'.$courseItem->image) }}" alt="#" />
                    <h2 class="mt-4">{{ $courseItem->title }}</h2>
                    <p>{{ $courseItem->description }}</p>
                    
                    <div class="latest-course mt-25 mb-30">
                        <h4 class="latest-course-title mb-30">{{ __('course.video.plural') }}</h4>
                        @foreach($videos as $video)
                        <div class="latest-course-item">
                            <div class="latest-course-img">
                                <a href="https://www.youtube.com/watch?v={{ $video->video_code }}" class="popup-youtube">
                                    <img src="{{ $video->thumbnail }}" alt="#">
                                </a>
                            </div>
                            <div class="latest-course-content">
                                <h5><a href="https://www.youtube.com/watch?v={{ $video->video_code }}" class="popup-youtube">{{ $video->title }}</a></h5>
                                <div class="latest-course-stars">
                                    <span>{{ $video->duration }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--End courses Details Content-->

            <!--Start courses Details Sidebar-->
            <div class="col-xl-4 col-lg-4">
                <div class="course-sidebar">
                    <ul class="course-details-info">
                        <li class="course-details-info-link">
                            <span class="course-details-info-icon"><i class="fas fa-video"></i></span>
                            {{ __('course.video.plural') }}: <span>{{ $courseItem->videos->count() }}</span>
                        </li>
                        <li class="course-details-info-link">
                            <span class="course-details-info-icon"><i class="far fa-flag"></i></span>
                            {{ __('course.category.single') }}: <span>{{ $category->title }}</span>
                        </li>
                        <li class="course-details-info-link">
                            <span class="course-details-info-icon"><i class="fas fa-language"></i></span>
                            {{ __('course.item.language') }}: <span>{{ __('course.item.'.$courseItem->language) }}</span>
                        </li>
                    </ul>              
                </div>
            </div>
            <!--End courses Details Sidebar-->
        </div>
        @else
            <div class="sec-title">
                <h4>{{ __('You do not have access to this section') }}</h4>
                <div class="text">
                    {{ __('For access, please contact the site administration') }}
                </div>
            </div>
        @endcan
    </div>
</section>
<!--End courses Details-->

@endsection