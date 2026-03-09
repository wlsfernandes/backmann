<!-- Hero Area -->
<div id="home-1" class="homepage-slides owl-carousel">

    @foreach ($banners as $banner)
        <div class="single-slide-item d-flex align-items-center"
            data-background="{{ route('admin.images.preview', ['model' => 'banners', 'id' => $banner->id]) }}">

            <div class="overlay-4"></div>

            <div class="hero-area-content">

                <div class="container">

                    <div class="row align-items-center">

                        <div class="col-xl-12 col-lg-12 col-md-10 wow fadeInUp animated" data-wow-delay=".2s">

                            <div class="section-title">

                                <h6 class="text-white">
                                    {{ $banner->{'subtitle_' . app()->getLocale()} }}
                                </h6>

                                <h1 class="text-white">
                                    {!! $banner->{'title_' . app()->getLocale()} !!}
                                </h1>

                            </div>

                            @if ($banner->link)
                                <a href="{{ $banner->link }}" class="white-btn mt-40"
                                    {{ $banner->open_in_new_tab ? 'target=_blank' : '' }}>
                                    {{ __('home.learn_more') }}
                                    <i class="fa-light fa-arrow-right"></i>
                                </a>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>
    @endforeach

</div>
