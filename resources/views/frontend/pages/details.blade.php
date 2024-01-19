@extends('frontend.layouts.index')
@section('front-title','Details')
@section('front-content')

<section class="ftco-section bg-light">
    <div class="container">
        {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Home</div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Profile</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Contact</div>
          </div> --}}

          
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <span class="subheading">Addons</span>
                @if (!empty($addons) && count($addons) > 0)
                
                <h2 class="mb-4">{{ isset($addons[0]['subproduct_name']) ? $addons[0]['subproduct_name'] : '' }}</h2>
                    
                @else

                <h2 class="mb-4">Addons</h2>
                    
                @endif
            </div>
        </div>
        <div class="row d-flex">
            @if (!empty($addons) && count($addons) > 0)
                
            @foreach ($addons as $addonKey => $addonValue)    
                
            {{-- <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" 
                    style="background-image: url({{ asset('uploads/' . $addonValue['addon_img']) }});">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 06, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">{{ isset($addonValue['title']) ? $addonValue['title'] : '' }}</a></h3>
                        <p>
                            {{
                                isset($addonValue['addon_description']) ? $addonValue['addon_description'] : '' 
                                }}
                        </p>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset('uploads/' . $addonValue['addon_img']) }}');">
                        <img src="{{ asset('uploads/' . $addonValue['addon_img']) }}" alt="{{ $addonValue['title'] }}">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 06, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">{{ isset($addonValue['title']) ? $addonValue['title'] : '' }}</a></h3>
                        <p>
                            {{ isset($addonValue['addon_description']) ? $addonValue['addon_description'] : '' }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach


            @else
                <h1>No addons</h1>
          
            {{-- <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{ asset('assets/frontend-theme/images/image_1.jpg') }});">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 06, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">Best for any industrial &amp; business solution</a></h3>
                        <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{ asset('assets/frontend-theme/images/image_2.jpg') }});">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 06, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">Best for any industrial &amp; business solution</a></h3>
                        <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{ asset('assets/frontend-theme/images/image_3.jpg') }});">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 06, 2020</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="#">Best for any industrial &amp; business solution</a></h3>
                        <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
                    </div>
                </div>
            </div> --}}
            @endif
        </div>
    </div>
</section>

@endsection