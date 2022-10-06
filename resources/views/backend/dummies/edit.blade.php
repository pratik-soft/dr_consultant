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
            <div class="col-md-6">

            <form action="{{ route('backend.dummies.update',$dummy->id) }}" method="POST" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Edit Dummy</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>

                @include('partials.backend.flash-message')
    
                

                <div class="card-body">
                    <div class="form-group row required">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">                            
                            <input type="text" name="name" value="{{ $dummy->name }}" class="form-control  @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control  @error('description') is-invalid @enderror" rows="3" name="description" placeholder="Description">{{ $dummy->description }}</textarea>
                            @error('description')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label for="posted_at" class="col-sm-2 col-form-label">Posted At</label>
                        <div class="col-sm-10">
                            <div class="input-group date"  data-target-input="nearest">
                                <input type="text" id="posted_at" name="posted_at" class="form-control datetimepicker-input" data-target="#posted_at" value="{{ $dummy->posted_at }}" class="form-control @error('posted_at') is-invalid @enderror" placeholder="Posted At"/>
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
                            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content">{{ $dummy->content }}</textarea>
                            @error('content')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">                            
                            <input id="image" type="file" name="image" class="form-control @error('image') is-invalid @enderror"  accept="image/*">
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
                            <select name="status" id="status" class="form-control custom-select">                                           
                                <option value="">--Please Select--</option>
                                <option value="1" @if($dummy->status == '1') selected @endif >Active</option>
                                <option value="0" @if($dummy->status == '0') selected @endif >Inactive</option>
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
                                <input type="radio" id="radioPrimary1" name="difficulty" value="easy" @if($dummy->difficulty == 'easy') checked @endif>
                                <label for="radioPrimary1">
                                    Easy
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="difficulty" value="hard" @if($dummy->difficulty == 'hard') checked @endif>
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
                                    <input type="checkbox" id="featured" name="featured"  @if($dummy->featured == '1') checked @endif type="checkbox">
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
                    <button type="submit" id="editBtn" class="btn btn-primary float-right"><i class="fas fa-pencil-alt"></i> Edit</button>
                </div>                
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            </form>
            </div>

            <div class="col-md-6">                
                <!-- /.card -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Image</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">                        
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>File Name</th>                                    
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                <?php if($dummy->image){ ?>
                                <tr>
                                    <td><img class="img-thumbnail mb-2" src="{{ getUploadedFile($dummy->image, 'dummies', 'user.jpg') }}" style="height:30px"></td>
                                    <td>{{ $dummy->image }}</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ asset('uploads/dummies/'.$dummy->image) }}" class="btn btn-info" target="_blank"><i class="fas fa-eye"></i></a>
                                            <!-- <a href="javascript:void(0)" url="{{ route('backend.blog.delete',$dummy->id) }}" id="{{ $dummy->id }}" onclick="deleteFile(this)" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                                        </div>
                                    </td>
                                </tr>                                                           
                                <?php } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center">No record(s) found.</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->                
                <!-- /.card -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Files</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>File Name</th>                                    
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php                            
                            foreach($dummy->files as $file)
                            {
                                ?>                                
                                <tr>
                                    <td><img class="img-thumbnail mb-2" src="{{ getUploadedFile($file->name, 'dummies/files', 'user.jpg') }}" style="height:30px"></td>
                                    <td>{{ $file->name }}</td>                                    
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ asset('uploads/dummies/files/'.$file->name) }}" class="btn btn-info" target="_blank"><i class="fas fa-eye"></i></a>
                                            <a href="javascript:void(0)" url="{{ route('backend.dummy_files.delete',$file->id) }}" id="{{ $file->id }}" onclick="deleteFile(this)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            if(count($dummy->files) == 0)
                            {
                                ?>
                                <td colspan="3" class="text-center">No record(s) found.</td>
                                <?php
                            }
                            ?>                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
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
<script src="{{ asset('js/backend/dummies/edit.js') }}"></script>
@endsection