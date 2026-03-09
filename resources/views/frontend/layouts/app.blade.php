<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.head')
</head>
<body>
@include('frontend.partials.header')


<main>
    @yield('content')
</main>

@include('frontend.partials.footer')


<!-- jQuery -->
<script src="{{ asset('assets/frontend/js/jquery-3.7.1.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<!-- Way Points JS -->
<script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
<!-- Pure Counter JS -->
<script src="{{ asset('assets/frontend/js/pure-counter.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<!-- Slick Slider JS -->
<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}"></script>
<!-- Isotope JS -->
<script src="{{ asset('assets/frontend/js/isotope-3.0.6-min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
<!-- Back To Top JS -->
<script src="{{ asset('assets/frontend/js/backToTop.js') }}"></script>
<!-- Metis Menu JS -->
<script src="{{ asset('assets/frontend/js/metismenu.js') }}"></script>
<!-- Progress Bar JS -->
<script src="{{ asset('assets/frontend/js/jquery.barfiller.js') }}"></script>
<!-- Appear JS -->
<script src="{{ asset('assets/frontend/js/jquery.appear.min.js') }}"></script>
<!-- Odometer JS -->
<script src="{{ asset('assets/frontend/js/odometer.min.js') }}"></script>

<!-- Fancybox JS -->
<script src="{{ asset('assets/frontend/js/jquery-fancybox.min.js') }}"></script>

<!-- GSAP Animation -->
<script src="{{ asset('assets/frontend/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/SplitText.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>
</html>
