<div class="py-1 top">
    <div class="container">
        <div class="row">
            <div class="col-sm text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex topper align-items-center">
                <p class="mb-0 w-100">
                    <span class="fa fa-paper-plane"></span>
                    <span class="text">thraex@email.com</span>
                </p>
            </div>
            <div class="col-sm justify-content-center d-flex mb-md-0 mb-2">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-7 d-flex topper align-items-center text-lg-right justify-content-end">
                <p class="mb-0 register-link"><a href="#" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModalCenter">Inquire Now</a></p>
            </div>
        </div>
    </div>
</div>
<div class="pt-4 pb-5">
    <div class="container">
        <div class="row d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-md-4 d-flex mb-2 mb-md-0">
                <a class="navbar-brand d-flex align-items-center" href="index.html">
                    <span class="flaticon flaticon-crane"></span>
                    <span class="ml-2">Wilcon <small>Construction Company</small></span>
                </a>
            </div>
            <div class="col-md-4 d-flex topper mb-md-0 mb-2 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="fa fa-map"></span>
                </div>
                <div class="pr-md-4 pl-md-3 pl-3 text">
                    <p class="con"><span>Free Call</span> <span>+1 234 456 78910</span></p>
                    <p class="con">Call Us Now 24/7 Customer Support</p>
                </div>
            </div>
            <div class="col-md-4 d-flex topper mb-md-0 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center"><span
                        class="fa fa-paper-plane"></span>
                </div>
                <div class="text pl-3 pl-md-3">
                    <p class="hr"><span>Our Location</span></p>
                    <p class="con">198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="{{ route('front.home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('front.products') }}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{ route('front.products') }}" class="nav-link">Products</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
              
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                
            </ul>
            <a href="#" class="btn-custom" data-toggle="modal" data-target="#exampleModalCenter">Inquire Now</a>
        </div>
    </div>
</nav> --}}

{{-- second --}}


{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="{{ route('front.home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('front.products') }}" class="nav-link">Services</a></li>
                <li class="nav-item dropdown"> --}}

{{-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            @if (!empty($products) && count($products) > 0)
                                @foreach ($products as $productsKey => $productsData)
                                    <a class="dropdown-item" href="#">{{ $productsData['product_name'] }}</a>
                                @endforeach
                            @else
                                <a class="dropdown-item" href="#">Product 1</a>
                                <a class="dropdown-item" href="#">Product 2</a>
                            @endif
                        </div>
                    </div> --}}
{{-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            
                            @if (!empty($products) && count($products) > 0)
                            @foreach ($products as $productsKey => $productsData)
                                <a class="dropdown-item" id="productDropdown{{ $productsData['id'] }}" href="#"
                                 data-id="{{ isset($productsData['id']) ? $productsData['id'] : '' }}">{{ 
                                isset($productsData['product_name']) ? $productsData['product_name'] : ''  }}</a>
                            @endforeach
                        @else
                            <a class="dropdown-item" href="#">Product 1</a>
                            <a class="dropdown-item" href="#">Product 2</a>
                        @endif
                          
                          
                            <div class="custom-dropdown">
                                <a class="dropdown-item" href="#">Subproduct 1.1</a>
                                <a class="dropdown-item" href="#">Subproduct 1.2</a>
                            </div>
                            
                            <div class="custom-dropdown">
                                <a class="dropdown-item" href="#">Subproduct 2.1</a>
                                <a class="dropdown-item" href="#">Subproduct 2.2</a>
                                <a class="dropdown-item" href="#">Subproduct 2.3</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            </ul>
            <a href="#" class="btn-custom" data-toggle="modal" data-target="#exampleModalCenter">Inquire Now</a>
        </div>
    </div>
</nav> --}}
{{-- @php
echo '<pre>';
print_r($products);
die;
@endphp --}}

{{-- @php
echo '<pre>';
print_r($groupedProducts);
die;
@endphp --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item active"> <a class="nav-link" href="{{ route('front.home') }}">Home </a> </li>
                <li class="nav-item"><a class="nav-link" href="#"> About </a></li>
                <li class="nav-item dropdown" id="myDropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Category </a>
                    <ul class="dropdown-menu">
                        @if (!empty($groupedProducts) && count($groupedProducts) > 0)
                            @foreach ($groupedProducts as $groupedProductsKey => $groupedProductsData)
                                <li> <a class="dropdown-item" href="#">
                                        {{ isset($groupedProductsData['product_name']) ? $groupedProductsData['product_name'] : '' }}
                                    </a>
                                    @if (!empty($groupedProductsData['subproducts']) && count($groupedProductsData['subproducts']) > 0)
                                        <ul class="submenu dropdown-menu">
                                            @foreach ($groupedProductsData['subproducts'] as $subProductKey => $subProductData)
                                                <li><a class="dropdown-item"
                                                        href="#">{{ $subProductData['subproduct_name'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @else
                            <li> <a class="dropdown-item" href="#"> Product 1 </a></li>
                            <li> <a class="dropdown-item" href="#"> Product 2 &raquo; </a>
                            <li><a class="dropdown-item" href="#"> Product 3 </a></li>
                            <li><a class="dropdown-item" href="#"> Product 4 </a></li>
                        @endif

                        <ul class="submenu dropdown-menu">
                            <li><a class="dropdown-item" href="#">SubProduct item 1</a></li>
                            <li><a class="dropdown-item" href="#">SubProduct item 2</a></li>
                            <li><a class="dropdown-item" href="#">SubProduct item 3 </a>
                                {{-- <ul class="submenu dropdown-menu">&raquo;
                    <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                    <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                  </ul> --}}
                            </li>
                            <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
                            <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
                        </ul>
                </li>

            </ul>
            </li>
            </ul>
        </div>
    </div>

</nav>


