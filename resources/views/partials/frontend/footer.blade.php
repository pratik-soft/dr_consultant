<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Company</h3>
                    <p>
                        {{ $settings['address'] }}                        
                    </p>
                    <br>
                    <p>
                        <strong>Phone : </strong><a href="tel:{{ $settings['phone'] }}">{{ $settings['phone'] }}</a><br>
                        <strong>Email : </strong><a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a><br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about-us') }}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Sitemap</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('terms-and-conditions') }}">Terms and Conditions</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('privacy-policy') }}">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>        
                        <?php $service_categories = get_service_categories(); ?>                
                        @foreach ($service_categories as $key => $service_category)
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('service-category',$service_category->slug) }}">{{ $service_category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Please subscribe your email address to get latest news, offers etc.</p>
                    <form action="" method="post" id="subscribeForm">
                        <input type="email" name="email" id="subscriptionEmail" placeholder="Your email"><input type="submit" value="Subscribe">                        
                    </form>                    
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                Copyright &copy; 2012-{{ date('Y') }}  <strong><span>{{ $settings['site_name'] }}</span></strong>. All Rights Reserved.
            </div>
            <!-- <div class="credits">                
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> -->
        </div>

        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="{{ $settings['twitter'] }}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
            <a href="{{ $settings['facebook'] }}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="{{ $settings['instagram'] }}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
            <a href="{{ $settings['skype'] }}" class="google-plus" target="_blank"><i class="bx bxl-skype"></i></a>
            <a href="{{ $settings['linkedin'] }}" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
        </div>

    </div>
</footer>
<!-- End Footer -->