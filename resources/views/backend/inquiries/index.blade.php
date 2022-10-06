@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'inquiries'])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Inquiries</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Inquiries</li>
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
                        <!-- <a class="btn btn-success" href="{{ route('backend.inquiries.create') }}"><i class="fas fa-plus"></i> Add</a> -->
                    </div>
                </div>
            <div class="row">
            <div class="col-12">
            <!-- Default box -->
            <div class="card card-default card-outline">
                <div class="card-header">
                    <h3 class="card-title">List Inquiries</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">                    
                    <table class="table table-bordered table-hover" id="ajaxDatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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

<div class="modal fade" id="inquiry-message-modal" tabindex="-1" role="dialog" aria-labelledby="inquiry-message-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="inquiry-message-modal-title">Inquiry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="inquiry-message-modal-body">            
            <strong>Subject</strong>
            <p class="text-muted" id="inquiry-subject"></p>            
            <strong>Message</strong>
            <p class="text-muted" id="inquiry-message"></p>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>            
        </div>
    </div>
  </div>
</div>
@endsection

@section('bodyClass', 'hold-transition sidebar-mini pace-primary')

@section('styles')

@endsection

@section('scripts')
<script src="{{ asset('js/backend/inquiries/index.js') }}"></script>
@endsection