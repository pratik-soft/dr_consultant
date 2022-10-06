@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'dummies'])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Dummies</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dummies</li>
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
                <div class="row text-right mb-1">
                    <div class="col-12">
                        <a class="btn btn-success" href="{{ route('backend.dummies.create') }}"><i class="fas fa-plus"></i> Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @include('backend.dummies.search')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-default card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <div class="btn-group datatable_actions">
                                    <button type="button" class="btn btn-success btn-sm" onclick="apply_action('ACTIVE','dummies/actions')" data-toggle="tooltip" data-placement="top" title="Active">
                                        <i class="fas fa-check"></i> Active
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" onclick="apply_action('INACTIVE','dummies/actions')" data-toggle="tooltip" data-placement="top" title="Inactive">
                                        <i class="fas fa-ban"></i> Inactive
                                    </button>                                    
                                    <button type="button" class="btn btn-danger btn-sm" onclick="apply_action('DELETE','dummies/actions')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="apply_action('RESTORE','dummies/actions')" data-toggle="tooltip" data-placement="top" title="Restore">
                                        <i class="fas fa-trash-restore"></i> Restore
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="apply_action('FORCE_DELETE','dummies/actions')" data-toggle="tooltip" data-placement="top" title="Force Delete">
                                        <i class="fas fa-eraser"></i> Force Delete
                                    </button>                                    
                                </div>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">                    
                            <table class="table table-bordered table-hover table-striped" id="ajaxDatatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 1%"><input type="checkbox" class="select_all_rows" onClick="select_deselect_rows(this.checked);"></th>
                                        <th style="width: 5%">ID</th>
                                        <th style="width: 15%">Name</th>
                                        <th>Description</th>
                                        <th style="width: 10%">Status</th>
                                        <th style="width: 10%">Created At</th>
                                        <th style="width: 10%">Updated At</th>
                                        <th style="width: 10%">Deleted At</th>
                                        <th style="width: 1%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer clearfix">                    
                            
                        </div> -->
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
<script src="{{ asset('js/backend/dummies/index.js') }}"></script>
@endsection