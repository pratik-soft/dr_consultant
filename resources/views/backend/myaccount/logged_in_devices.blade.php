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
                            <li class="breadcrumb-item active">Logged In Devices</li>
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
                @include('backend.myaccount.sidebar', ['myaccountMenu' => 'logged_in_devices'])
            </div>
            
            <div class="col-md-9">

            <form action="{{ route('backend.myaccount.change_password_action') }}" method="POST" id="changePasswordForm">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-default card-outline">
                <div class="card-header">
                    <h3 class="card-title">Logged In Devices</h3>
                
                    <div class="card-tools">                        
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-12 text-right">
                            <a href="{{ count($devices) > 1 ? '/backend/myaccount/logout/all' : '#' }}" class="btn btn-danger {{ count($devices) == 1 ? 'disabled' : '' }}">Remove All Devices</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover table-striped" id="ajaxDatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>IP</th>
                                <th style="width:12%" >Last Activity</th>
                                <th style="width:12%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices as $device)
                                <tr>
                                    <td>{{ $device->user_agent }}</td>
                                    <td>{{ $device->ip_address }}</td>
                                    <td>{{ Carbon\Carbon::parse($device->last_activity)->diffForHumans() }}</td>
                                    @if ($current_session_id == $device->id)
                                    <td><button type="button" :disabled="true" class="btn btn-primary btn-sm">This Device</button></td>
                                    @else
                                    <td><a href="/backend/myaccount/logout/{{$device->id}}" class="btn btn-danger">Remove</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>         
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">                                        
                    <button type="submit" id="editBtn" class="btn btn-primary float-right"><i class="fas fa-pencil-alt"></i> Change Password</button>
                </div>                 -->
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
<script src="{{ asset('js/backend/myaccount/logged_in_devices.js') }}"></script>
@endsection