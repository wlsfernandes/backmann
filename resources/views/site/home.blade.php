@extends('frontend.layouts.app')

@section('content')
    @include('frontend.partials.banner')
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="las la-times"></i>
            </button>
        </div>
        <div class="logo-side">
            <div class="logo">
                @if ($setting && $setting->image_url)
                    <img src="{{ route('admin.images.preview', ['model' => 'settings', 'id' => $setting->id]) }}"
                        alt="Banner image" style="width:198px;height:64px">
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('assets/frontend/img/logo-white.png') }}" alt="logo">
                    </a>
                @endif
            </div>
        </div>
        <div class="side-info">
            <div class="contact-list mb-40">
                <div class="contact-list mb-40">
                    <p>{{ __('home.welcome_message') }}</p>
                    <img src="{{ asset('assets/frontend/img/off-canvas.jpg') }}" alt="">

                    <div class="mt-30 mb-30">
                        <a href="{{ url('/contact') }}" class="white-btn">{{ __('home.get_in_touch') }}</a>
                    </div>
                </div>


            </div>
            <div class="social-area-wrap">

                @foreach ($social_links as $social_link)
                    <a href="{{ $social_link->url }}" target="_blank">
                        <i class="{{ $social_link->icon() }}"></i>
                    </a>
                @endforeach

            </div>
        </div>
    </div>

    <div class="offcanvas-overlay"></div>

    <!-- Service Section -->
    <div id="service-1" class="service-section section-padding">
        <div class="container">

            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="section-title">
                        <h2 class="visible-slowly-right">
                            {{ __('home.home_welcome') }}
                        </h2>

                        <p class="pt-20 wow fadeInUp animated" data-wow-delay=".4s">
                            {{ __('home.services_description') }}
                        </p>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-5 text-md-end">
                    <a href="services.html" class="bordered-btn">
                        {{ __('home.view_all_services') }}
                        <i class="fa-light fa-arrow-right"></i>
                    </a>
                </div>

            </div>

            <div class="row service-wrapper">

                {{-- Service 1 --}}
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft animated" data-wow-delay="200ms">
                    <div class="single-service-item">

                        <img src="{{ asset('assets/frontend/img/service/1.jpg') }}" alt="">

                        <div class="service-info-wrap">
                            <div class="service-info-inner">

                                <span>{{ __('home.service_installation_label') }}</span>

                                <h5>
                                    {{ __('home.service_installation_title') }}
                                </h5>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- Service 2 --}}
                <div class="col-xl-3 col-lg-3 col-md-6 mt-50 wow fadeInLeft animated" data-wow-delay="400ms">
                    <div class="single-service-item">

                        <img src="{{ asset('assets/frontend/img/service/2.jpg') }}" alt="">

                        <div class="service-info-wrap">
                            <div class="service-info-inner">

                                <span>{{ __('home.service_tiling_label') }}</span>

                                <h5>
                                    {{ __('home.service_tiling_title') }}
                                </h5>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- Service 3 --}}
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft animated" data-wow-delay="600ms">
                    <div class="single-service-item">

                        <img src="{{ asset('assets/frontend/img/service/3.jpg') }}" alt="">

                        <div class="service-info-wrap">
                            <div class="service-info-inner">

                                <span>{{ __('home.service_repair_label') }}</span>

                                <h5>
                                    {{ __('home.service_repair_title') }}
                                </h5>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- Service 4 --}}
                <div class="col-xl-3 col-lg-3 col-md-6 mt-50 wow fadeInLeft animated" data-wow-delay="800ms">
                    <div class="single-service-item">

                        <img src="{{ asset('assets/frontend/img/service/4.jpg') }}" alt="">

                        <div class="service-info-wrap">
                            <div class="service-info-inner">

                                <span>{{ __('home.service_refinishing_label') }}</span>

                                <h5>
                                    {{ __('home.service_refinishing_title') }}
                                </h5>

                            </div>
                        </div>

                    </div>
                </div>

            </div>


            {{-- Accordion --}}
            <div class="row mt-60">

                <div class="cp-custom-accordion">

                    <div class="accordions" id="accordionExample">

                        {{-- Accordion 1 --}}
                        <div class="accordion-items wow fadeInUp animated" data-wow-delay="200ms">

                            <h2 class="accordion-header" id="headingOne">

                                <button class="accordion-buttons" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#serviceOne" aria-expanded="true" aria-controls="serviceOne">

                                    {{ __('home.accordion_installation_title') }}

                                </button>

                            </h2>

                            <div id="serviceOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">

                                <div class="accordion-body">
                                    {{ __('home.accordion_installation_text') }}
                                </div>

                            </div>

                        </div>


                        {{-- Accordion 2 --}}
                        <div class="accordion-items wow fadeInUp animated" data-wow-delay="400ms">


                            <div id="serviceTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">

                                <div class="accordion-body">
                                    {{ __('home.accordion_installation_text') }}
                                </div>

                            </div>

                        </div>


                        {{-- Accordion 3 --}}
                        <div class="accordion-items wow fadeInUp animated" data-wow-delay="600ms">

                            <h2 class="accordion-header" id="headingThree">

                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#serviceThree" aria-expanded="false" aria-controls="serviceThree">

                                    {{ __('home.accordion_repair_title') }}

                                </button>

                            </h2>

                            <div id="serviceThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">

                                <div class="accordion-body">
                                    {{ __('home.accordion_installation_text') }}
                                </div>

                            </div>

                        </div>


                        {{-- Accordion 4 --}}
                        <div class="accordion-items wow fadeInUp animated" data-wow-delay="800ms">

                            <h2 class="accordion-header" id="headingFour">

                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#serviceFour" aria-expanded="false" aria-controls="serviceFour">

                                    {{ __('home.accordion_refinishing_title') }}

                                </button>

                            </h2>

                            <div id="serviceFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">

                                <div class="accordion-body">
                                    {{ __('home.accordion_installation_text') }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- About Section -->
    <div id="about-1" class="about-section section-padding pt-0">

        <div class="container">

            <div class="row">

                <div class="col-xl-5 col-lg-6 col-md-7">

                    <div class="section-title">

                        <h2 class="visible-slowly-right">
                            {{ __('home.about_title') }}
                        </h2>

                        <p class="pt-20 wow fadeInUp animated" data-wow-delay=".4s">
                            {{ __('home.about_description') }}
                        </p>

                    </div>

                </div>

                <div class="col-xl-7 col-lg-6 col-md-5 text-md-end">

                    <a href="about.html" class="bordered-btn">
                        {{ __('home.about_button') }}
                        <i class="fa-light fa-arrow-right"></i>
                    </a>

                </div>

            </div>


            <div class="row gx-0">

                <div class="col-xl-6 col-lg-6">

                    <div class="about-img-wrap wow img-custom-anim-left" data-wow-delay=".3s">

                        <img src="{{ asset('assets/frontend/img/about/1.jpg') }}" alt="">

                    </div>

                </div>


                <div class="col-xl-6 col-lg-6">

                    <div class="cp-custom-accordion">

                        <div class="accordions" id="accordionAbout">


                            {{-- History --}}
                            <div class="accordion-items">

                                <h2 class="accordion-header" id="aboutOne">

                                    <button class="accordion-buttons" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                        {{ __('home.about_history_title') }}

                                    </button>

                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="aboutOne"
                                    data-bs-parent="#accordionAbout">

                                    <div class="accordion-body">
                                        {{ __('home.about_history_text') }}
                                    </div>

                                </div>

                            </div>


                            {{-- Mission --}}
                            <div class="accordion-items">

                                <h2 class="accordion-header" id="aboutTwo">

                                    <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                        {{ __('home.about_mission_title') }}

                                    </button>

                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="aboutTwo"
                                    data-bs-parent="#accordionAbout">

                                    <div class="accordion-body">
                                        {{ __('home.about_mission_text') }}
                                    </div>

                                </div>

                            </div>


                            {{-- Vision --}}
                            <div class="accordion-items">

                                <h2 class="accordion-header" id="aboutThree">

                                    <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">

                                        {{ __('home.about_vision_title') }}

                                    </button>

                                </h2>

                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="aboutThree"
                                    data-bs-parent="#accordionAbout">

                                    <div class="accordion-body">
                                        {{ __('home.about_vision_text') }}
                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!-- Footer Section -->
@endsection
