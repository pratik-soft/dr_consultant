@extends('layouts.frontend', ['menu' => 'Blog'])

@section('meta_title', 'Blog')
@section('meta_description', 'Blog')
@section('meta_keywords', 'Blog')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Blog</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Blog</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 entries">                    
                    @foreach ($blogs as $key => $blog)
                    <article class="entry" data-aos="fade-up">
                        <div class="entry-img">
                            <img src="{{ getBlogImage($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="{{ route('blog-detail',$blog->slug) }}">{{ $blog->title }}</a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="{{ route('blog-detail',$blog->slug) }}">John Doe</a></li>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="{{ route('blog-detail',$blog->slug) }}"><time datetime="2020-01-01">{{ $blog->posted_at->diffForHumans() }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="{{ route('blog-detail',$blog->slug) }}">12 Comments</a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>
                                {{ Str::limit(strip_tags($blog->content), 250) }}
                            </p>
                            <div class="read-more">
                                <a href="{{ route('blog-detail',$blog->slug) }}">Read More</a>
                            </div>
                        </div>
                    </article>
                    <!-- End blog entry -->
                    @endforeach

                    {!! $blogs->links() !!}

                    <!-- <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li class="disabled"><i class="icofont-rounded-left"></i></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <!-- End blog entries list -->
                @include('frontend.blog.sidebar')
            </div>
        </div>
    </section>
    <!-- End Blog Section -->
</main>
<!-- End #main -->
@endsection