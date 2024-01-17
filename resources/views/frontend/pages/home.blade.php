@extends('frontend.layouts.index')
@section('front-title','Products')
@section('front-content')



<section class="hero-wrap js-fullheight" style="background-image: url('{{ asset('assets/frontend-theme/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-lg-6 ftco-animate">
                <div class="mt-5">
                    <h1 class="mb-4">We Build <br>Great Projects</h1>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                    <p><a href="#" class="btn btn-primary">Our Services</a> <a href="#" class="btn btn-white" data-toggle="modal" data-target="#exampleModalCenter">Request A Quote</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 mb-4">
    <div class="container">
        <div class="row no-gutters d-flex">
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer-1"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Quality Construction</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>      
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2 d-flex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-worker-1"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Professional Liability</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>      
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Dedicated To Our Clients</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</section>


@endsection