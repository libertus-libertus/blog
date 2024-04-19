@extends('frontend.main')
@section('content')

@section('title')
    Solusi digitalisasi
@endsection

<!-- banner-area -->
@include('frontend.landing_page.carousel')
<!-- banner-area-end -->

<!-- about-area -->
@include('frontend.landing_page.about')
<!-- about-area-end -->

<!-- services-area -->
@include('frontend.landing_page.services')
<!-- services-area-end -->

<!-- work-process-area -->
@include('frontend.landing_page.work_process')
<!-- work-process-area-end -->

<!-- portfolio-area -->
@include('frontend.landing_page.portfolio')
<!-- portfolio-area-end -->

<!-- partner-area -->
@include('frontend.landing_page.partner')
<!-- partner-area-end -->

<!-- testimonial-area -->
@include('frontend.landing_page.testimonial')
<!-- testimonial-area-end -->

<!-- blog-area -->
@include('frontend.landing_page.blog')
<!-- blog-area-end -->

<!-- contact-area -->
@include('frontend.landing_page.contact')
<!-- contact-area-end -->

@endsection
