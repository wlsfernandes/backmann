@extends('frontend.layouts.app')

@section('content')
    <div class="breadcrumb-area contact">
        <div class="overlay-3"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="breadcrumb-title">
                        <h1>Contact</h1>
                    </div>
                    <div class="breadcrumb-icon">
                        <i class="las la-angle-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section  -->
    <div class="contact-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="contact-text">
                        <p>@lang('contact.description')</p>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-6 offset-lg-1 col-lg-6">
                    <div class="subimit-form-wrap">
                        <div class="section-title">
                            <h2 class="visible-slowly-right">@lang('contact.title')</h2>
                        </div>
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <input type="hidden" name="website">
                            <input type="text" name="name" placeholder="@lang('contact.name')">
                            <input type="email" name="email" placeholder="@lang('contact.email')">
                            <input type="tel" name="number" placeholder="@lang('contact.phone_number')">
                            <textarea name="message" cols="30" rows="10" placeholder="@lang('contact.message')"></textarea>
                            <input type="submit" value="@lang('contact.send_message')">
                        </form>
                    </div>
                </div>
            </div>
            <div class="contact-info-wrap">
                <div class="row mt-60">
                    <div class="col-xl-6">
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps?q=Bachmann+Floors&output=embed" width="600"
                                height="600" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-info">
                            <div class="section-title">
                                <h2 class="visible-slowly-right">Contact Info</h2>
                            </div>
                            <div class="contact-info-inner">
                                <div class="single-contact-info wow fadeInUp animated" data-wow-delay="200ms">
                                    <p>Email</p>
                                    <h4>{{ $setting->contact_email ?? '' }}</h4>
                                </div>
                                <div class="single-contact-info wow fadeInUp animated" data-wow-delay="400ms">
                                    <p>Phone</p>
                                    <h4>{{ $setting->contact_phone ?? '' }}</h4>
                                </div>
                                <div class="single-contact-info wow fadeInUp animated" data-wow-delay="600ms">
                                    <p>Address</p>
                                    <h4>{{ $setting->address ?? '' }}</h4>
                                </div>
                                <div class="social-area">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-skype"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
