@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'blog'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.blog.index') }}">Blog</a></li>
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
                                <h3 class="card-title">View Blog</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">ID</dt>
                                    <dd class="col-sm-8">{{ $blog->id }}</dd>
                                    <dt class="col-sm-4">Title</dt>
                                    <dd class="col-sm-8">{{ $blog->title }}</dd>
                                    <dt class="col-sm-4">Slug</dt>
                                    <dd class="col-sm-8"><a href="{{ $blog->slug }}">{{ $blog->slug }}</a></dd>
                                    <dt class="col-sm-4">Posted At</dt>
                                    <dd class="col-sm-8">{!! getDatetimeHtml($blog->posted_at,'secondary') !!}</dd>
                                    <dt class="col-sm-4">Content</dt>
                                    <dd class="col-sm-8">{!! $blog->content !!}</dd>                                                                                                            
                                    <dt class="col-sm-4">Image</dt>
                                    <dd class="col-sm-8">
                                        <img class="img-thumbnail" src="{{ getBlogImage($blog->image) }}" style="height:150px">
                                    </dd>
                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8">
                                        @if($blog->status == 'PUBLISHED') <badge class="badge badge-pill badge-success">PUBLISHED</badge> @else <badge class="badge badge-pill badge-danger">DRAFT</badge> @endif
                                    </dd>
                                    <dt class="col-sm-4">Featured</dt>
                                    <dd class="col-sm-8">
                                        @if($blog->featured == '1') <span class="badge badge-pill badge-success"><i class="fa fa-check"></i></span> @else <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i></span> @endif
                                    </dd>
                                    <dt class="col-sm-4">Created At</dt>
                                    <dd class="col-sm-8">{!! getDatetimeHtml($blog->created_at,'success') !!}</dd>
                                    <dt class="col-sm-4">Updated At</dt>
                                    <dd class="col-sm-8">{!! getDatetimeHtml($blog->updated_at,'primary') !!}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a type="button" class="btn btn-default" href="{{ route('backend.blog.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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