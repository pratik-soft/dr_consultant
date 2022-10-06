@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'permissions'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Permissions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.permissions.index') }}">Permissions</a></li>
                            <li class="breadcrumb-item active">Add</li>
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
            <div class="col-md-12">
            <form action="{{ route('backend.permissions.store') }}" method="POST" id="addForm">
                @csrf
            <!-- Default box -->            
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">Add Permission</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>                
    
                

                <div class="card-body">
                    <div class="form-group row required">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">                            
                            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.permissions.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
                    <button type="submit" id="addBtn" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add</button>
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
<script src="{{ asset('js/backend/permissions/create.js') }}"></script>
@endsection