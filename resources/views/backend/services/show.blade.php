@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'services'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Services</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.services.index') }}">Services</a></li>
                            <li class="breadcrumb-item active">View</li>
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
                        <!-- Default box -->
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">View Service</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">ID</dt>
                                    <dd class="col-sm-8">{{ $service->id }}</dd>
                                    <dt class="col-sm-4">Name</dt>
                                    <dd class="col-sm-8">{{ $service->name }}</dd>
                                    <dt class="col-sm-4">Slug</dt>
                                    <dd class="col-sm-8"><a href="{{ $service->slug }}">{{ $service->slug }}</a></dd>                                    
                                    <dt class="col-sm-4">Detail</dt>
                                    <dd class="col-sm-8">{!! $service->detail !!}</dd>                                                                                                            
                                    <dt class="col-sm-4">Image</dt>
                                    <dd class="col-sm-8">
                                        <img class="img-thumbnail" src="{{ getServiceImage($service->image) }}" style="height:150px">
                                    </dd>
                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8">
                                        @if($service->status == 'PUBLISHED') <badge class="badge badge-pill badge-success">PUBLISHED</badge> @else <badge class="badge badge-pill badge-danger">DRAFT</badge> @endif
                                    </dd>
                                    <dt class="col-sm-4">Featured</dt>
                                    <dd class="col-sm-8">
                                        @if($service->featured == '1') <span class="badge badge-pill badge-success"><i class="fa fa-check"></i></span> @else <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i></span> @endif
                                    </dd>
                                    <dt class="col-sm-4">Created At</dt>
                                    <dd class="col-sm-8">{!! getDatetimeHtml($service->created_at,'success') !!}</dd>
                                    <dt class="col-sm-4">Updated At</dt>
                                    <dd class="col-sm-8">{!! getDatetimeHtml($service->updated_at,'primary') !!}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a type="button" class="btn btn-default" href="{{ route('backend.services.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
                            </div>
                            <!-- /.card-footer -->
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