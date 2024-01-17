<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('front-title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwTl" crossorigin="anonymous"> --}}



    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend-theme/css/style.css') }}">
    <style>
		
        @media all and (min-width: 992px) {
            .dropdown-menu li {
                position: relative;
            }

            .nav-item .submenu {
                display: none;
                position: absolute;
                left: 100%;
                top: -7px;
            }

            .nav-item .submenu-left {
                right: 100%;
                left: auto;
            }

            .dropdown-menu>li:hover {
                background-color: #f1f1f1
            }

            .dropdown-menu>li:hover>.submenu {
                display: block;
            }
        }

        /* ============ desktop view .end// ============ */

        /* ============ small devices ============ */
        @media (max-width: 991px) {
            .dropdown-menu .dropdown-menu {
                margin-left: 0.7rem;
                margin-right: 0.7rem;
                margin-bottom: .5rem;
            }
        }

    </style>
</head>

<body>

    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container d-flex align-items-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
					<li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
					<li class="nav-item"><a href="project.html" class="nav-link">Projects</a></li>
					<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
				</ul>
				<a href="#" class="btn-custom" data-toggle="modal" data-target="#exampleModalCenter">Inquire Now</a>
			</div>
		</div>
	</nav> --}}
    @include('frontend.layouts.navbar')
    <!-- END nav -->





    @yield('front-content')




    {{-- <section class="ftco-section" id="about-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-flex align-items-stretch">
					<div class="about-wrap img w-100" style="background-image: url(images/about.jpg);">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-crane"></span></div>
					</div>
				</div>
				<div class="col-md-6 py-5 pl-md-5">
					<div class="row justify-content-center mb-4 pt-md-4">
						<div class="col-md-12 heading-section ftco-animate">
							<span class="subheading">Welcome to Wilcon</span>
							<h2 class="mb-4">Wilcon A Construction Company</h2>
							<div class="d-flex about">
								<div class="icon"><span class="flaticon-hammer"></span></div>
								<h3>We're in this business since 1975 and We provide the best insdustrial services</h3>
							</div>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<div class="d-flex video-image align-items-center mt-md-4">
								<a href="#" class="video img d-flex align-items-center justify-content-center" style="background-image: url(images/about-2.jpg);">
									<span class="fa fa-play-circle"></span>
								</a>
								<h4 class="ml-4">This is how we work on our clients, Watch video</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

    {{-- <section class="ftco-intro">
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
	</section> --}}


    @include('frontend.layouts.footer')

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close d-flex align-items-center justify-content-center"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="fa fa-close"></span>
                    </button>
                </div>
                <div class="modal-body p-4 p-md-5">
                    <form action="#" class="appointment-form ftco-animate">
                        <h3>Request Quote</h3>
                        <div class="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Select Your Services</option>
                                            <option value="">Architecture</option>
                                            <option value="">Renovation</option>
                                            <option value="">Construction</option>
                                            <option value="">Interior &amp; Exterior</option>
                                            <option value="">Chemical Research</option>
                                            <option value="">Petroleum &amp; Gas</option>
                                            <option value="">Other Services</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('assets/frontend-theme/js/jquery.min.js') }}"></script>
    <script>
        // $(document).ready(function () {
        // $(".dropdown-item").hover(function () {
        // 	// Get the index of the hovered item
        // 	var index = $(this).index();
        // 	console.log(index)

        // 	// Hide all subproduct dropdowns
        // 	$(".custom-dropdown").hide();

        // 	// Show the subproduct dropdown for the hovered item
        // 	$(".custom-dropdown").eq(index).show();
        // });
        // });

    </script>
    <script src="{{ asset('assets/frontend-theme/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/popper.min.js') }} "></script>
    <script src="{{ asset('assets/frontend-theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/scrollax.min.js') }}"></script>

    @yield('front-footer')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets/frontend-theme/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/frontend-theme/js/main.js') }}"></script>

</body>

</html>
