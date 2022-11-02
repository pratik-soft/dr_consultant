@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'form'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Form</li>
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
                        @can('form-create')
                            <a class="btn btn-success" href="{{ route('backend.form.create') }}"><i class="fas fa-plus"></i> Add</a>
                        @endcan
                        @can('form-create')
                            <a class="btn btn-success" href="{{ route('backend.form.create') }}"><i class="fas fa-plus"></i> Add Patient Assessment</a>
                        @endcan
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        @include('backend.form.search')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                    
                        <!-- Default box -->
                        <div class="card card-default card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <div class="btn-group datatable_actions">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="apply_action('DELETE','form/actions')" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm" onclick="apply_action('ACTIVE','form/actions')" data-toggle="tooltip" data-placement="top" title="Active">
                                            <i class="fas fa-check"></i> Active
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" onclick="apply_action('INACTIVE','form/actions')" data-toggle="tooltip" data-placement="top" title="Inactive">
                                            <i class="fas fa-ban"></i> Inactive
                                        </button>                                        
                                        <button type="button" class="btn btn-dark btn-sm" onclick="apply_action('BLOCK','form/actions')" data-toggle="tooltip" data-placement="top" title="BLOCK">
                                            <i class="fas fa-lock"></i> Block
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
                                            <th style="width: 3%">Avatar</th>
                                            <th style="width: 15%">Name</th>
                                            <th style="width: 15%">Email</th>
                                            <th style="width: 10%">Phone</th>
                                            <th>Roles</th>
                                            <th style="width: 5%">Status</th>
                                            <th style="width: 10%">Created At</th>
                                            <th style="width: 10%">Updated At</th>
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
<script src="{{ asset('js/backend/form/index.js') }}"></script>
@endsection