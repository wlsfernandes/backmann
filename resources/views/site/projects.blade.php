@extends('frontend.layouts.app')

@section('content')
    <div class="breadcrumb-area work">
        <div class="overlay-3"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="breadcrumb-title">
                        <h1>{{ __('projects.breadcrumb_title') }}</h1>
                    </div>
                    <div class="breadcrumb-icon">
                        <i class="las la-angle-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Section -->
    <div id="project-1" class="project-section section-padding">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="section-title">
                        <h2 class="visible-slowly-right">
                            {{ __('projects.section_title') }}
                        </h2>
                        <p class="pt-20">
                            {{ __('projects.section_description') }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-5 text-md-end">
                    <a href="" class="bordered-btn">{{ __('projects.view_all_projects') }} <i
                            class="fa-light fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="row project-wrapper">

                @foreach ($projects as $index => $project)
                    <div class="col-lg-4 wow fadeInUp animated" data-wow-delay="{{ ($index + 1) * 200 }}ms">

                        <div class="single-project-item">

                            <div class="project-bg">
                                <img src="{{ $project->banner_url }}" alt="{{ $project->title }}">
                            </div>

                            <div class="project-info">

                                <h6>{{ $project->title }}</h6>

                                <a href="{{ route('site.projects.show', $project->slug) }}">
                                    {{ __('projects.read_more') }}
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Project Slider -->
    <div class="project-slider-wrap-two">
        <div class="project-img-slider-two owl-carousel">
            <div class="project-img">
                <img src="assets/frontend/img/project-slider/2-1.jpg" alt="">
            </div>
            <div class="project-img">
                <img src="assets/frontend/img/project-slider/2-2.jpg" alt="">
            </div>
            <div class="project-img">
                <img src="assets/frontend/img/project-slider/2-4.jpg" alt="">
            </div>
        </div>
    </div>

    <!-- Process Section -->
    <div id="process-2" class="process-section section-padding">
        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-5 col-lg-4 col-md-4">
                    <div class="section-title">
                        <h6>Our Process</h6>
                        <h2 class="visible-slowly-right">From consultation to perfection, every time</h2>
                        <p class="pt-20">Our seamless flooring process ensures quality from consultation to installation,
                            guaranteeing satisfaction every step of the way.</p>
                    </div>
                    <a href="testimonial.html" class="bordered-btn">Get In Touch <i class="fa-light fa-arrow-right"></i></a>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1"></div>
                <div class="col-xl-6 col-lg-7 col-md-7">
                    <div class="single-process-wrap wow fadeInUp animated" data-wow-delay="200ms">
                        <div class="process-icon">
                            <img src="assets/frontend/img/process/2-1.png" alt="">
                            <span class="step-count">1.</span>
                        </div>
                        <div class="process-content">
                            <div class="process-title">
                                <h5>Consultation</h5>
                            </div>
                            <div class="process-text">
                                <p>The architecture company meets with the client to discuss their needs, budget, and
                                    timeline.</p>
                            </div>
                        </div>
                    </div>
                    <div class="single-process-wrap wow fadeInUp animated" data-wow-delay="400ms">
                        <div class="process-icon">
                            <img src="assets/frontend/img/process/2-2.png" alt="">
                            <span class="step-count">2.</span>
                        </div>
                        <div class="process-content">
                            <div class="process-title">
                                <h5>Material Selection</h5>
                            </div>
                            <div class="process-text">
                                <p>The architecture company meets with the client to discuss their needs, budget, and
                                    timeline.</p>
                            </div>
                        </div>
                    </div>
                    <div class="single-process-wrap wow fadeInUp animated" data-wow-delay="600ms mb-0">
                        <div class="process-icon">
                            <span class="step-count">3.</span>
                            <img src="assets/frontend/img/process/2-3.png" alt="">
                        </div>
                        <div class="process-content">
                            <div class="process-title">
                                <h5>Preparation</h5>
                            </div>
                            <div class="process-text">
                                <p>The architecture company meets with the client to discuss their needs, budget, and
                                    timeline.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
