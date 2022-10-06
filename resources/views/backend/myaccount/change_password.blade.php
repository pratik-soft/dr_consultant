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
                            <li class="breadcrumb-item active">Change Password</li>
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
                @include('backend.myaccount.sidebar', ['myaccountMenu' => 'change_password'])
            </div>
            
            <div class="col-md-9">

            <form action="{{ route('backend.myaccount.change_password_action') }}" method="POST" id="changePasswordForm">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-default card-outline">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row required">
                        <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">                            
                            <input id="old_password" type="password" name="old_password" value="{{ old('old_password') }}" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password">
                            @error('old_password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">                            
                            <input id="new_password" type="password" name="new_password" value="{{ old('new_password') }}" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
                            @error('new_password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">                            
                            <input id="confirm_password" type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password">
                            @error('confirm_password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                                        
                    <button type="submit" id="editBtn" class="btn btn-primary float-right"><i class="fas fa-pencil-alt"></i> Change Password</button>
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
<script src="{{ asset('js/backend/myaccount/change_password.js') }}"></script>
@endsection