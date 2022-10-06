@extends('layouts.frontend', ['menu' => 'Contact'])

@section('meta_title', 'Contact')
@section('meta_description', 'Contact')
@section('meta_keywords', 'Contact')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        <!-- <iframe style="border:0; width: 100%; height: 350px;" src="{{ $settings['google_map_url'] }}" frameborder="0" allowfullscreen></iframe> -->
        <div class="mapouter">
            <div class="gmap_canvas">
              <iframe style="border:0; width: 100%; height: 350px;" width="600" height="500" id="gmap_canvas" src="{{ $settings['google_map_url'] }}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <style>.mapouter{position:relative;text-align:right;width:100%px;}</style>
                <style>.gmap_canvas {overflow:hidden;background:none!important;width:100%px;}</style>
            </div>
        </div>
    </div>

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-3 info">
                  <i class="icofont-google-map"></i>
                  <h4>Location</h4>
                  <p>{{ $settings['address'] }}</p>
                </div>

                <div class="col-lg-3 info mt-3 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Call</h4>
                  <p><a href="tel:{{ $settings['phone'] }}">{{ $settings['phone'] }}</a></p>
                  <p><a href="tel:{{ $settings['alternate_phone'] }}">{{ $settings['alternate_phone'] }}</a></p>
                </div>

                <div class="col-lg-3 info mt-3 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email</h4>
                  <p><a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></p>
                  <p><a href="mailto:{{ $settings['alternate_email'] }}">{{ $settings['alternate_email'] }}</a></p>
                </div>

                <div class="col-lg-3 info mt-3 mt-lg-0">
                  <i class="icofont-clock-time"></i>
                  <h4>Open Hours</h4>
                  <p>{{ $settings['open_hours_days'] }}</p>
                  <p>{{ $settings['open_hours_time'] }}</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">                
                <form action="{{ route('contact-action') }}" method="post" role="form" class="php-email-form" id="contactForm">
                    <div class="row text-center mb-3">
                      <h3>Inquiry</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"/>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"/>
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone"/>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"/>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection

@section('scripts')
<script src="{{ asset('js/frontend/contact/index.js') }}"></script>
@endsection