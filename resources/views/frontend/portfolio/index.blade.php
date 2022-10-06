@extends('layouts.frontend', ['menu' => 'Portfolio'])

@section('meta_title', 'Portfolio')
@section('meta_description', 'Portfolio')
@section('meta_keywords', 'Portfolio')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Portfolio</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Portfolio</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>                        
						@foreach ($categories as $key => $category)
						<li data-filter=".filter-{{ $category->id }}">{{ $category->name }}</li>
						@endforeach
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container" data-aos="fade-up">
				@foreach ($portfolios as $key => $portfolio)
				<div class="col-lg-4 col-md-6 portfolio-item filter-{{ $portfolio->category->id }}">
                    <img src="{{ getPortfolioImage($portfolio->image) }}" class="img-fluid" alt="{{ $portfolio->name }}">
                    <div class="portfolio-info">
                        <h4>{{ $portfolio->name }}</h4>
                        <p>{{ $portfolio->category->name }}</p>
                        <a href="{{ getPortfolioImage($portfolio->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $portfolio->name }}"><i class="bx bx-plus"></i></a>
                        <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
                    </div>
                </div>
                @endforeach                
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
</main>
<!-- End #main -->
@endsection