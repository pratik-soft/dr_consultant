<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">        
        <!-- <h1 class="logo me-auto"><a href="{{ route('home') }}"><span>{{ $settings['site_name'] }}</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ getSiteLogo(isset($settings['site_logo']) ? $settings['site_logo'] : '') }}" alt="" class="img-fluid"></a>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="@isset($menu) @if($menu == 'Home') active @endif @endisset"><a href="{{ route('home') }}">Home</a></li>
                <li class="drop-down @isset($menu) @if($menu == 'About Us' || $menu == 'Team' || $menu == 'Testimonials') active @endif @endisset"><a href="">About</a>
                    <ul>
                        <li class="@isset($menu) @if($menu == 'About Us') active @endif @endisset"><a href="{{ route('about-us') }}">About Us</a></li>
                        <li class="@isset($menu) @if($menu == 'Team') active @endif @endisset"><a href="{{ route('team') }}">Team</a></li>
                        <li class="@isset($menu) @if($menu == 'Testimonials') active @endif @endisset"><a href="{{ route('testimonials') }}">Testimonials</a></li>                        
                    </ul>
                </li>
                <li class="drop-down @isset($menu) @if($menu == 'Services') active @endif @endisset"><a href="{{ route('services') }}">Services</a>
                    <ul>
                        <?php $service_categories = get_service_categories(); ?>
                        @foreach ($service_categories as $key => $service_category)
                        <li class="drop-down"><a href="{{ route('service-category',$service_category->slug) }}">{{ $service_category->name }}</a>
                            <ul>
                                @foreach ($service_category->services as $key => $service)
                                <li><a href="{{ route('service-detail',$service->slug) }}">{{ $service->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>                
                <li class="@isset($menu) @if($menu == 'Portfolio') active @endif @endisset"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                <li class="@isset($menu) @if($menu == 'Pricing') active @endif @endisset"><a href="{{ route('pricing') }}">Pricing</a></li>
                <li class="@isset($menu) @if($menu == 'Blog') active @endif @endisset"><a href="{{ route('blog') }}">Blog</a></li>
                <li class="@isset($menu) @if($menu == 'Contact') active @endif @endisset"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav><!-- .nav-menu -->
        <div class="header-social-links">
            <button type="button" class="btn btn-primary btn-sm" onclick="location.href='{{ url("backend/login") }}';">Customer Login</button>
        </div>
    </div>
</header><!-- End Header -->