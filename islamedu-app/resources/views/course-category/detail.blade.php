@extends('layouts.wrap')

@section('content')

<!-- Start main-content -->
<section class="page-title" style="background-image: url(/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $courseCategory->title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/home">Главная</a></li>
                <li>{{ $courseCategory->title }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- Courses Section -->
<section>
    <div class="container pb-100">
        <div class="row">
            @foreach($items as $item)
            <!-- Course Block Two-->
            <div class="course-block-two col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="{{ route('course-item.show', ['course_item' => $item]) }}"><img src="{{ asset('storage/'.$item->image) }}" alt=""></a></figure>
                        
                        <div class="value">{{ $item->category->title }}</div>
                    </div>
                    <div class="content-box">
                        
                        <h5 class="title"><a href="{{ route('course-item.show', ['course_item' => $item]) }}">{{ $item->title }}</a></h5>
                        <ul class="course-info">
                            <li><i class="fas fa-video"></i> {{ $item->videos_count }} {{ __('course.item.videos')}}</li>
                            <li><i class="fas fa-language"></i> {{ __('course.item.'.$item->language) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End -->
            @endforeach
        </div>
    </div>
</section>
<!-- End Courses Section-->

@endsection