@extends('layouts.frontend', ['menu' => 'Team'])

@section('meta_title', 'Team')
@section('meta_description', 'Team')
@section('meta_keywords', 'Team')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Team</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Team</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Our <strong>Team</strong></h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
            <div class="row">
                
                @foreach ($teams as $key => $team)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up">
                        <div class="member-img">
                            <img src="{{ getTeamPhoto($team->photo) }}" class="img-fluid" alt="{{ $team->fullname }}">
                            <!-- <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div> -->
                        </div>
                        <div class="member-info">
                            <h4>{{ $team->fullname }}</h4>
                            <span>{{ $team->position->name }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- End Our Team Section -->
</main>
<!-- End #main -->
@endsection