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
                            <li class="breadcrumb-item active">Update Profile</li>
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
                @include('backend.myaccount.sidebar', ['myaccountMenu' => 'update_profile'])
            </div>
            
            <div class="col-md-9">

            <form action="{{ route('backend.myaccount.update_profile') }}" method="POST" id="updateProfileForm">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-default card-outline">
                <div class="card-header">
                    <h3 class="card-title">Update Profile</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row required">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">                            
                            <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="form-control  @error('first_name') is-invalid @enderror" placeholder="First Name">
                            @error('first_name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">                            
                            <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="form-control  @error('last_name') is-invalid @enderror" placeholder="Last Name">
                            @error('last_name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">                            
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">                            
                            <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control  @error('phone') is-invalid @enderror" placeholder="Phone">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                                        
                    <button type="submit" id="editBtn" class="btn btn-primary float-right"><i class="fas fa-pencil-alt"></i> Update Profile</button>
                </div>                
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            </form>
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
<script src="{{ asset('js/backend/myaccount/index.js') }}"></script>
@endsection