@extends('layouts.wrap')

@section('content')
<!-- Categories Section -->
<section class="categories-section-current">
    <div class="auto-container">
        <div class="anim-icons">
            <span class="icon icon-group-1 bounce-y"></span>
            <span class="icon icon-group-2 bounce-y"></span>
        </div>

        <div class="sec-title text-center">
            <span class="sub-title">Выберите категорию</span>
            <h2>Наши курсы</h2>
        </div>

        <div class="row justify-content-center">
            @foreach($categories as $category)
            <!-- Category Block -->
            <div class="category-block-current col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="inner-box">
                    <a href="{{ route('course-category.show', ['course_category' => $category]) }}">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('storage/'.$category->icon) }}" />
                            </div>
                        </div>
                        <h6 class="title">{{ $category->title }}</a></h6>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Product Categories -->
@endsection
