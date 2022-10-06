@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => ''])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>My Account</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.myaccount.index') }}">My Account</a></li>
                            <li class="breadcrumb-item active">Profile Information</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @include('partials.backend.flash-message')
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        
        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
            
                    <div class="col-md-3">
                        @include('backend.myaccount.sidebar', ['myaccountMenu' => 'profile_information'])
                    </div>

                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">                                    
                                    <img class="profile-user-img img-fluid img-circle" src="{{ getAvatar() }}" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>

                                <p class="text-muted text-center">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            {{ $v }}
                                        @endforeach
                                    @endif
                                </p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
            
                    <div class="col-md-6">
            
                        <!-- Default box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                                </div>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-user mr-1"></i>ID #</strong>
                                <p class="text-muted">{{ $user->id }}</p>
                                <hr>

                                <strong><i class="fas fa-user mr-1"></i> First Name</strong>
                                <p class="text-muted">{{ $user->first_name }}</p>
                                <hr>

                                <strong><i class="fas fa-user mr-1"></i> Last Name</strong>
                                <p class="text-muted">{{ $user->last_name }}</p>
                                <hr>

                                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                <p class="text-muted"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                                <hr>

                                <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                                <p class="text-muted"><a href="tel:{{ $user->email }}">{{ $user->phone }}</a></p>
                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                                <p class="text-muted">Malibu, California</p>
                                <hr>

                                <strong><i class="fas fa-users mr-1"></i>Roles</strong>
                                <p class="text-muted">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-secondary">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </p>
                                <hr>
                                
                                <strong><i class="fas fa-clock mr-1"></i> Member since</strong>
                                <br>
                                <span class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ $user->created_at }}">{{ $user->created_at->diffForHumans() }}</span>
                                <hr>

                                <strong><i class="fas fa-clock mr-1"></i> Last Updated</strong>
                                <br>
                                <span class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ $user->updated_at }}">{{ $user->updated_at->diffForHumans() }}</span>
                                <hr>                                

                                <strong><i class="fas fa-ban mr-1"></i>Status</strong>
                                <p class="text-muted">{!! getUserStatusHtml($user->status) !!}</p>
                            </div>
                            <!-- /.card-body -->                            
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('partials.backend.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection


@section('bodyClass', 'hold-transition sidebar-mini pace-primary')

@section('styles')
@endsection

@section('scripts')
@endsection