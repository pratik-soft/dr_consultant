@extends('layouts.frontend', ['menu' => 'Testimonials'])

@section('meta_title', 'Testimonials')
@section('meta_description', 'Testimonials')
@section('meta_keywords', 'Testimonials')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Testimonials</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Testimonials</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">
            <div class="row">

                @foreach ($testimonials as $key => $testimonial)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ 100 * $key }} ">
                    <div class="testimonial-item">
                        <img src="{{ getTestimonialPhoto($testimonial->photo) }}" class="testimonial-img" alt="{{ $testimonial->fullname }}">
                        <h3>{{ $testimonial->fullname }}</h3>
                        <h4>{{ $testimonial->position->name }}</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{ $testimonial->review }}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- End Testimonials Section -->
</main>
<!-- End #main -->
@endsection