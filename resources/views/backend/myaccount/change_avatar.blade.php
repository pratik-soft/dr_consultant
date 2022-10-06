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
                            <li class="breadcrumb-item active">Change Avatar</li>
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
                @include('backend.myaccount.sidebar', ['myaccountMenu' => 'change_avatar'])
            </div>
            
            <div class="col-md-9">

   
            <!-- Default box -->
            <div class="card card-default card-outline">
                <div class="card-header">
                    <h3 class="card-title">Change Avatar</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div id="upload-demo" style="width:300px"></div>
                        </div>
                        <div class="col-md-8">
                            <strong>Select Image:</strong>
                            <br/>
                            <input type="file" id="upload" accept="image/*">                            
                        </div>
                        <!-- <div class="col-md-4">
                            <div id="upload-demo-i" style="background:#e1e1e1;width:300px;height:300px;"></div>
                        </div> -->
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">                                        
                    <button type="button" id="uploadAvatarBtn" class="btn btn-primary float-right"><i class="fas fa-pencil-alt"></i> Upload Avatar</button>
                </div>                
                <!-- /.card-footer-->
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
<script>
    var user_photo_url = '{{ getAvatar() }}';
</script>
<script src="{{ asset('js/backend/myaccount/change_avatar.js') }}"></script>
@endsection