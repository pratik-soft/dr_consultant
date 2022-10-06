@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'clients'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Clients</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.clients.index') }}">Clients</a></li>
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
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">View Client</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">ID</dt>
                                    <dd class="col-sm-8">{{ $client->id }}</dd>
                                    <dt class="col-sm-4">Logo</dt>
                                    <dd class="col-sm-8">
                                        <img class="img-thumbnail" src="{{ getClientImage($client->logo) }}" style="height:100px">
                                    </dd>
                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8">
                                        @if($client->status == '1') <badge class="badge badge-pill badge-success">Active</badge> @else <badge class="badge badge-pill badge-warning">Inactive</badge> @endif
                                    </dd>
                                    <dt class="col-sm-4">Created At</dt>
                                    <dd class="col-sm-8">{!! getDatetimeHtml($client->created_at,'success') !!}</dd>
                                    <dt class="col-sm-4">Updated At</dt>
                                    <dd class="col-sm-8">{!! getDatetimeHtml($client->updated_at,'primary') !!}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a type="button" class="btn btn-default" href="{{ route('backend.clients.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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