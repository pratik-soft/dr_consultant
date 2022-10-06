@extends('layouts.frontend', ['menu' => 'Pricing'])

@section('meta_title', 'Pricing')
@section('meta_description', 'Pricing')
@section('meta_keywords', 'Pricing')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Pricing</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Pricing</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="box">
                        <h3>Silver</h3>
                        <h4><sup>Rs.</sup>6599<span> / year</span></h4>
                        <ul>
                            <li><b>1</b> DOMAIN</li>
                            <li><b>500MB</b> DISK SPACE</li>
                            <li><b>UNLIMITED</b> BANDWIDTH</li>
                            <li><b>1</b> EMAIL ADDRESS</li>
                            <li><b>24/7</b> SUPPORT</li>                            
                            <li><b>STATIC (1 PAGE)</b> WEBSITE</li>
                            <li>OPTIMIZED</li>
                            <li>SEO</li>
                            <li class="na">MARKETING</li>                                                        
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{ route('contact') }}" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="box">
                        <span class="advanced">Popular</span>
                        <h3>Gold</h3>
                        <h4><sup>Rs.</sup>11599<span> / year</span></h4>
                        <ul>
                            <li><b>1</b> DOMAIN</li>
                            <li><b>1GB DISK</b> SPACE</li>
                            <li><b>UNLIMITED</b> BANDWIDTH</li>
                            <li><b>3</b> EMAIL ADDRESS</li>
                            <li><b>24/7</b> SUPPORT</li>                            
                            <li><b>DYNAMIC (10+ PAGES)</b> WEBSITE</li>                            
                            <li><b>SEMI</b> OPTIMIZED</li>
                            <li>SEO</li>
                            <li class="na">MARKETING</li>                            
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{ route('contact') }}" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="box">                        
                        <span class="advanced">Advanced</span>
                        <h3>Diamond</h3>
                        <h4><sup>Rs.</sup>15599<span> / year</span></h4>
                        <ul>
                            <li><b>1</b> DOMAIN</li>
                            <li><b>3GB</b> DISK SPACE</li>
                            <li><b>UNLIMITED</b> BANDWIDTH</li>
                            <li><b>5</b> EMAIL ADDRESS</li>
                            <li><b>24/7</b> SUPPORT</li>                            
                            <li><b>DYNAMIC (15+ PAGES)</b> WEBSITE</li>                                                        
                            <li><b>FULLY</b> OPTIMIZED</li>
                            <li>SEO</li>
                            <li>MARKETING</li>                            
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{ route('contact') }}" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Section -->
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="faq-list">
                <ul>
                    @foreach ($faqs as $key => $faq)
                    <li data-aos="fade-up" data-aos-delay="{{ 100 * $key }} ">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{ $faq->id }}">{{ $faq->question }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-{{ $faq->id }}" class="collapse @if ($key == 0) show @endif" data-bs-parent=".faq-list">
                            <p>
                                {{ $faq->answer }}
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- End Frequently Asked Questions Section -->
</main>
<!-- End #main -->
@endsection