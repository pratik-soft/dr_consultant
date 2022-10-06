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
                            <li class="breadcrumb-item"><a href="{{ route('backend.dummies.index') }}">Dummies</a></li>
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
            <form action="{{ route('backend.dummies.store') }}" method="POST" id="addForm" enctype="multipart/form-data">
                @csrf
            <!-- Default box -->            
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">Add Dummy</h3>

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
                    <div class="form-group row required">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="3" name="description" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="form-group row">
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
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>                        
                        <div class="col-sm-10">
                            <!-- <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div> -->
                            <input id="image" type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="image" accept="image/*">
                            @error('image')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="files" class="col-sm-2 col-form-label">Files</label>
                        <div class="col-sm-10">                                                        
                            <input id="files" type="file" name="files[]" class="form-control @error('files') is-invalid @enderror" multiple="multiple" accept="image/*">
                            @error('files')
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
                            <select name="status" id="status" class="form-control custom-select">                                           
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
                        <label for="status" class="col-sm-2 col-form-label">Difficulty</label>
                        <div class="col-sm-10">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="difficulty" value="easy" checked>
                                <label for="radioPrimary1">
                                    Easy
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="difficulty" value="hard">
                                <label for="radioPrimary2">
                                    Hard
                                </label>
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check12">                                
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="featured" name="featured" checked>
                                    <label for="featured">
                                        Is Featured ?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.dummies.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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
<script src="{{ asset('js/backend/dummies/create.js') }}"></script>
@endsection