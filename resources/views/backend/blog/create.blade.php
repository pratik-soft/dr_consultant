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
            <form action="{{ route('backend.blog.store') }}" method="POST" id="addForm" enctype="multipart/form-data">
                @csrf
            <!-- Default box -->            
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">Add Blog</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>                
    
                

                <div class="card-body">
                    <div class="form-group row required">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">                            
                            <input id="title" type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                            @error('title')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input id="slug" type="text" name="slug" value="{{ old('slug') }}" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">
                            @error('slug')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="posted_at" class="col-sm-2 col-form-label">Posted At</label>
                        <div class="col-sm-10">
                            <div class="input-group date"  data-target-input="nearest">
                                <input type="text" id="posted_at" name="posted_at" class="form-control datetimepicker-input" data-target="#posted_at" value="{{ old('posted_at') }}" class="form-control @error('posted_at') is-invalid @enderror" placeholder="Posted At"/>
                                <div class="input-group-append" data-target="#posted_at" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>                            
                            @error('posted_at')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="content" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input id="image" type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="image" accept="image/*">
                            @error('image')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="form-group row required">
                        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <?php 
                                $old_category_id = old('category_id');                                
                            ?>                            
                            <select name="category_id" id="category_id" class="form-control">                                
                                <option value="">--Please Select--</option>
                                <?php
                                foreach($categories as $key=>$val)
                                {
                                    ?><option value="<?php echo $key; ?>" <?php if($old_category_id == $key){?> selected="selected"<?php } ?>><?php echo $val; ?></option><?php
                                }
                                ?>
                            </select>
                            @error('category_id')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            <?php 
                                $old_tags = old('tags');                                
                            ?>                            
                            <select name="tags[]" id="tags" class="form-control" multiple>                                
                                <?php
                                foreach($tags as $key=>$val)
                                {
                                    ?><option value="<?php echo $key; ?>" <?php if($old_tags == $key){?> selected="selected"<?php } ?>><?php echo $val; ?></option><?php
                                }
                                ?>
                            </select>
                            @error('tags')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <?php 
                                $old_status = old('status');                                
                            ?>                            
                            <select name="status" id="status" class="form-control">                                           
                                <option value="">--Please Select--</option>
                                <option value="1" <?php if($old_status && $old_status == '1'){?> selected="selected"<?php } ?>>Active</option>
                                <option value="0" <?php if($old_status && $old_status == '0'){?> selected="selected"<?php } ?>>Inactive</option>
                            </select>
                            @error('status')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input id="featured" type="checkbox" name="featured" class="form-check-input" placeholder="featured">
                                <label for="featured" class="form-check-label">Featured</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.blog.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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
<script src="{{ asset('js/backend/blog/create.js') }}"></script>
@endsection