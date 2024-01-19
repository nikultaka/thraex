@extends('frontend.layouts.index')
@section('front-title','About')
@section('front-content')


<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/frontend-theme/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>About Us <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-3 bread">About Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="about-wrap img w-100"
                 style="background-image: url('{{ asset('uploads/' . $aboutCms->img) }}');">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-crane"></span></div>
                </div>
            </div>
            <div class="col-md-6 py-5 pl-md-5">
                <div class="row justify-content-center mb-4 pt-md-4">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Welcome to Wilcon</span>
                        <h2 class="mb-4">{{ isset($aboutCms->title) ? $aboutCms->title : '' }}</h2>
                        <div class="d-flex about">
                            <div class="icon"><span class="flaticon-hammer"></span></div>
                            <h3>{{ isset($aboutCms->sub_title) ? $aboutCms->sub_title : '' }}</h3>
                        </div>
                        <p>{{ isset($aboutCms->description) ? $aboutCms->description : '' }}</p>
                        {{-- <div class="d-flex video-image align-items-center mt-md-4">
                            <a href="#" class="video img d-flex align-items-center justify-content-center"
                              style="background-image: url('{{ asset('assets/frontend-theme/images/about-2.jpg') }}');">
                                <span class="fa fa-play-circle"></span>
                            </a>
                            <h4 class="ml-4">This is how we work on our clients, Watch video</h4>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="img"  style="background-image: url(images/bg_2.jpg);">
                    <div class="overlay"></div>
                    <h2>Providing Personalized and High Quality Services</h2>
                    <p>We can manage your dream building A small river named Duden flows by their place</p>
                    <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Request A Quote</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection