@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'subscribers'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Subscribers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.subscribers.index') }}">Subscribers</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">

            <form action="{{ route('backend.subscribers.update',$subscriber->id) }}" method="POST" id="editForm">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Edit Subscriber</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>

                @include('partials.backend.flash-message')
    
                

                <div class="card-body">
                    <div class="form-group row required">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">                            
                            <input type="text" name="email" value="{{ $subscriber->email }}" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                                        
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.subscribers.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
                    <button type="submit" id="editBtn" class="btn btn-primary float-right"><i class="fas fa-pencil-alt"></i> Edit</button>
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
<script src="{{ asset('js/backend/subscribers/edit.js') }}"></script>
@endsection