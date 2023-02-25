@extends('layouts.wrap')

@section('content')

<!-- Start main-content -->
<section class="page-title" style="background-image: url(/images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">Поиск</h1>
            <ul class="page-breadcrumb">
                <li><a href="/home">Главная</a></li>
                <li>Поиск</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<!-- Courses Section -->
<section>
    <div class="container pb-100">
        @if($results->count() > 0)
        <div class="sec-title">
            <h4>Результаты поиска по запросу "{{ $q }}"</h4>
            <div class="text">
                Найдено: {{ $results->count() }}
            </div>
        </div>
        <div class="row">
            @foreach($results as $item)
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
        @else
        <div class="sec-title">
            <h4>По запросу "{{ $q }}" ничего не найдено</h4>
            <div class="text">
                Найдено: {{ $results->count() }}
            </div>
        </div>
        @endif
    </div>
</section>
<!-- End Courses Section-->

@endsection