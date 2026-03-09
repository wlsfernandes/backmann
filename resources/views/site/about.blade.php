@extends('frontend.layouts.app')

@section('content')
    <div class="breadcrumb-area about">
        <div class="overlay-5"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="breadcrumb-title">
                        <h1>About Us</h1>
                    </div>
                    <div class="breadcrumb-icon">
                        <i class="las la-angle-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($abouts as $about)
        <div class="about-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 order-2 order-md-1">
                        <div class="about-content-wrap">
                            {!! $about->content() !!}
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 order-1 order-md-2">
                        <div class="about-img-wrap">
                            <img src="{{ route('admin.images.preview', ['model' => 'about', 'id' => $about->id]) }}"
                                alt="{{ $about->title() }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- About More  -->
    <div class="about-more">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h4>@lang('home.elevate')</h4>
                </div>
            </div>
            <div class="row gy-4 mt-40">
                <div class="col-lg-6 col-md-6">
                    <div class="about-more-img obverse">
                        <img src="assets/img/about/about-more-img-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-content-wrap obverse">
                        <p>@lang('home.about_desc1')</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Counter Section -->
    <div class="counter-section section-padding pb-0">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-counter-box highlights">
                        <p class="counter-number"><span class="purecounter" data-purecounter-duration="1"
                                data-purecounter-end="2015">2015</span></p>
                        <h6>@lang('home.since')</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-counter-box">
                        <p class="counter-number"><span class="purecounter" data-purecounter-duration="1"
                                data-purecounter-end="730">730</span></p>
                        <h6>@lang('home.projects')</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-counter-box">
                        <p class="counter-number"><span class="purecounter" data-purecounter-duration="1"
                                data-purecounter-end="3000">+3000</span></p>
                        <h6>@lang('home.satisfied_clients')</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
