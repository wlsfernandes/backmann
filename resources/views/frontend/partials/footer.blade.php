<div class="footer-section pt-80" data-background="assets/frontend/img/footer-bg.jpg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-5 col-md-6">

                <div class="footer-content-wrap">

                    <div class="section-title">

                        <h2 class="text-white visible-slowly-right">
                            <div class="cms-html">
                                {!! __('home.footer_cta_title') !!}
                            </div>
                        </h2>

                    </div>

                    <hr>

                    <p class="text-white wow fadeInUp animated" data-wow-delay="400ms">
                    <div class="cms-html">
                        {!! __('home.footer_cta_description') !!}
                    </div>
                    </p>

                    <a href="{{ url('contact') }}" class="white-btn mt-20 wow fadeInDown animated"
                        data-wow-delay="600ms">

                        <div class="cms-html">
                            {!! __('home.footer_cta_button') !!}
                        </div>
                        <i class="fa-light fa-arrow-right"></i>

                    </a>

                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-1"></div>
            <div class="col-xl-3 col-lg-3 col-md-5">
                <div class="contact-info-wrap mt-40">
                    <div class="single-contact-info wow fadeInUp animated" data-wow-delay="200ms">
                        <h6 class="text-white">{{ __('home.contact_phone') }}</h6>
                        <p class="p-xl">{{ $setting->contact_phone ?? '' }}</p>
                    </div>
                    <div class="single-contact-info wow fadeInUp animated" data-wow-delay="400ms">
                        <h6 class="text-white">{{ __('home.contact_email') }}</h6>
                        <p>{{ $setting->contact_email ?? '' }}</p>
                    </div>
                    <div class="single-contact-info wow fadeInUp animated" data-wow-delay="600ms">
                        <h6 class="text-white">{{ __('home.contact_directions') }}</h6>
                        <p>{{ $setting->address ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="footer-bottom">
    <div class="row align-items-center justify-content-center">
        <div class="site-info text-center">
            <p class="mb-0">Copyright © {{ date('Y') }} {{ $setting->company_name ?? '' }} - All rights reserved.
            </p>
        </div>
    </div>
</div>
<div class="search-popup">
    <span class="search-back-drop"></span>

    <div class="search-inner">
        <div class="container">
            <div class="logo">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="frontend/assets/img/logo-white.png"
                        alt=""></a>
            </div>
            <button class="close-search"><span class="la la-times"></span></button>
            <form method="post" action="{{ url('/') }}">
                <div class="form-group">
                    <input type="search" name="search-field" value="" placeholder="Type your keyword"
                        required="">
                    <button type="submit"><i class="fal fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
