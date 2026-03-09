@extends('frontend.layouts.app')

@section('content')
    <div class="offcanvas-overlay"></div>

    <!-- Breadcrumb Area  -->
    <div class="breadcrumb-area service">
        <div class="overlay-5"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="breadcrumb-title">
                        <h1>Our Services</h1>
                    </div>
                    <div class="breadcrumb-icon">
                        <i class="las la-angle-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Section -->
    <div id="service-3" class="service-page service-section section-padding">

        <div class="container">

            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-7">

                    <div class="section-title">

                        <h2 class="visible-slowly-right">
                            {{ __('services.title') }}
                        </h2>

                        <p class="pt-20">
                            {{ __('services.description') }}
                        </p>

                    </div>

                </div>

                <div class="col-xl-6 col-lg-6 col-md-5 text-md-end">

                    <a href="" class="bordered-btn">
                        {{ __('services.view_all') }}
                        <i class="fa-light fa-arrow-right"></i>
                    </a>

                </div>

            </div>


            <div class="row gy-4 align-items-center">

                <div class="col-lg-6">
                    <div class="service-img-wrap wow img-custom-anim-left" data-wow-delay=".3s">
                        <img src="{{ asset('assets/frontend/img/service/service-img.jpg') }}" alt="">
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="row gy-4">

                        <div class="col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="200ms">

                            <div class="single-service-item">

                                <img src="{{ asset('assets/frontend/img/service/4-1.jpg') }}" alt="">

                                <div class="service-info">

                                    <span>{{ __('services.premium') }}</span>

                                    <h6>{{ __('services.installation') }}</h6>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="400ms">

                            <div class="single-service-item">

                                <img src="{{ asset('assets/frontend/img/service/4-2.jpg') }}" alt="">

                                <div class="service-info">

                                    <span>{{ __('services.premium') }}</span>

                                    <h6>{{ __('services.installation') }}</h6>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="600ms">

                            <div class="single-service-item">

                                <img src="{{ asset('assets/frontend/img/service/4-3.jpg') }}" alt="">

                                <div class="service-info">

                                    <span>{{ __('services.premium') }}</span>

                                    <h6>{{ __('services.installation') }}</h6>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="800ms">

                            <div class="single-service-item">

                                <img src="{{ asset('assets/frontend/img/service/4-4.jpg') }}" alt="">

                                <div class="service-info">

                                    <span>{{ __('services.premium') }}</span>

                                    <h6>{{ __('services.installation') }}</h6>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="row mt-120">

                <div class="col-lg-6">

                    <div class="cp-custom-accordion">

                        <div class="accordions" id="accordionExample">

                            <div class="accordion-items">

                                <h2 class="accordion-header">

                                    <button class="accordion-buttons" data-bs-toggle="collapse"
                                        data-bs-target="#serviceOne">

                                        {{ __('services.accordion_installation_title') }}

                                    </button>

                                </h2>

                                <div id="serviceOne" class="accordion-collapse collapse show">

                                    <div class="accordion-body">

                                        {{ __('services.accordion_installation_text') }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-6">

                    <div class="service-img-wrap wow img-custom-anim-right" data-wow-delay=".3s">

                        <img src="{{ asset('assets/frontend/img/service/service-img-2.jpg') }}" alt="">

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
