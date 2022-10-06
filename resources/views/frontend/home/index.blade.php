@extends('layouts.frontend', ['menu' => 'Home'])

@section('meta_title', 'Home')
@section('meta_description', 'Home')
@section('meta_keywords', 'Home')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(themes/frontend/assets/img/slide/slide-1.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>Welcome to <span>Company</span></h2>
                        <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                        <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(themes/frontend/assets/img/slide/slide-2.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>Lorem Ipsum Dolor</h2>
                        <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                        <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(themes/frontend/assets/img/slide/slide-3.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>Sequi ea ut et est quaerat</h2>
                        <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                        <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    </div>
</section>
<!-- End Hero -->
<main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>About Us</strong></h2>
            </div>
            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>Eum ipsam laborum deleniti velitena</h2>
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                        <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
                    </ul>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Services</strong></h2>
                <p>We provides following services 24*7.</p>
            </div>
			
			<div class="row">
                <?php $service_categories = get_service_categories(); $i = 1; ?>
				@foreach ($service_categories as $key1 => $service_category)
					@foreach ($service_category->services as $key2 => $service)						
						<div class="col-lg-4 mb-4" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
							<div class="card h-100 shadow">
								<a href="{{ route('service-detail',$service->slug) }}"><img class="card-img-top" src="{{ getServiceImage($service->image) }}" alt="{{ $service->name }}"></a>
								<div class="card-body">
									<h4 class="card-title">
										<a href="{{ route('service-detail',$service->slug) }}">{{ $service->name }}</a>
									</h4>
									<p class="card-text">{{ Str::limit(strip_tags($service->detail), 100) }}</p>
								</div>
							</div>
						</div>
                        <?php $i++; ?>
					@endforeach                    
				@endforeach				
			</div>
			<!-- /.row -->
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Clients</h2>
            </div>
            <div class="clients-slider swiper-container" data-aos="fade-up">
                <div class="swiper-wrapper align-items-center">
                    @foreach ($clients as $key => $client)
                    <div class="swiper-slide"><img src="{{ getClientImage($client->logo) }}" class="img-fluid" alt=""></div>
                    @endforeach                    
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <svg style="color: deeppink" xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                        </svg>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $settings['happy_clients'] }}" data-purecounter-duration="1" class="purecounter">{{ $settings['happy_clients'] }}</span>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <svg style="color: #ee6c20;" xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-journal-richtext" viewBox="0 0 16 16">
                            <path d="M7.5 3.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542l1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                        </svg>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $settings['projects'] }}" data-purecounter-duration="1" class="purecounter">{{ $settings['projects'] }}</span>
                            <p>Projects</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <svg style="color: #15be56;" xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                            <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z"/>
                        </svg>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $settings['hours_of_support'] }}" data-purecounter-duration="1" class="purecounter">{{ $settings['hours_of_support'] }}</span>
                            <p>Hours Of Support</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <svg style="color: #bb0852;" xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $settings['team_strength'] }}" data-purecounter-duration="1" class="purecounter">{{ $settings['team_strength'] }}</span>
                            <p>Team Strength</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

</main>
<!-- End #main -->
@endsection