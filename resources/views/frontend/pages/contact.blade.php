@extends('frontend.layouts.index')
@section('front-title','Contact')
@section('front-content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/frontend-theme/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact us <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-3 bread">Contact us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb mb-5" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Contact us</span>
                <h2 class="mb-4">Message us for more details</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-8">
                <form class="form" method="POST" id="emailForm" action="{{ url('/sendmail') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea cols="30" rows="7" class="form-control" id="message" name="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                                <div class="spinner-border text-primary"  style="vertical-align: middle !important;display:none;" role="status">
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>

            <div class="col-md-4 d-flex pl-md-5" id="contactRefresh">
                <div class="row">
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                            <p><span>Address:</span> {{ isset($contactCms['address']) ? $contactCms['address'] : '' }}</p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                            <p><span>Phone:</span> <a href="tel://1234567920">{{ isset($contactCms['phone']) ? $contactCms['phone'] : '' }}</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                            <p><span>Email:</span> <a href="mailto:{{ isset($contactCms['email']) ?
                                $contactCms['email'] : '' }}">{{ isset($contactCms['email']) ?
                             $contactCms['email'] : '' }}</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="text">
                            <p><span>Website</span> <a href="{{ isset($contactCms['website']) ?
                                $contactCms['website'] : '' }}">{{ isset($contactCms['website']) ?
                                $contactCms['website'] : '' }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-12">
                <div id="map" class="map"></div>
            </div> --}}
        </div>
    </div>
</section>


@endsection
@section('front-footer')

<script type="text/javascript" src="{{ asset('assets/frontend-theme/js/index.js') }}"></script>

@endsection