@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'portfolio'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Portfolio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.portfolio.index') }}">Portfolio</a></li>
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

            <form action="{{ route('backend.portfolio.update',$portfolio->id) }}" method="POST" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Edit Portfolio</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>

                @include('partials.backend.flash-message')
    
                

                <div class="card-body">
                    <div class="form-group row required">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">                            
                            <input type="text" id="name" name="name" value="{{ $portfolio->name }}" class="form-control  @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                        <input type="text" id="slug" name="slug" value="{{ $portfolio->slug }}" class="form-control  @error('slug') is-invalid @enderror" placeholder="Slug">
                            @error('slug')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                                        
                    <div class="form-group row required">
                        <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                        <div class="col-sm-10">
                            <textarea id="detail" name="detail" class="form-control @error('detail') is-invalid @enderror" placeholder="Detail">{{ $portfolio->detail }}</textarea>
                            @error('detail')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <img class="img-thumbnail mb-2" src="{{ getPortfolioImage($portfolio->image) }}" style="height:150px">
                            <input id="image" type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="image" accept="image/*">
                            @error('image')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="form-group row required">
                        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">                            
                            <select name="category_id" id="category_id" class="form-control">                                
                                <option value="">--Please Select--</option>
                                <?php
                                foreach($categories as $key=>$val)
                                {
                                    ?><option value="<?php echo $key; ?>" <?php if($portfolio->category_id == $key){?> selected="selected"<?php } ?>><?php echo $val; ?></option><?php
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
                                $old_tags = $portfolio->tags->pluck('id')->toArray();
                            ?>                            
                            <select name="tags[]" id="tags" class="form-control" multiple>                                
                                <?php
                                foreach($tags as $key=>$val)
                                {
                                    ?><option value="<?php echo $key; ?>" <?php if(in_array($key, $old_tags)){?> selected="selected"<?php } ?>><?php echo $val; ?></option><?php
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
                            <select name="status" id="status" class="form-control">                                           
                                <option value="">--Please Select--</option>
                                <option value="1" @if($portfolio->status == '1') selected @endif >Active</option>
                                <option value="0" @if($portfolio->status == '0') selected @endif >Inactive</option>
                            </select>
                            @error('status')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input id="featured" @if($portfolio->featured == '1') checked @endif type="checkbox" name="featured" class="form-check-input" placeholder="featured">
                                <label for="featured" class="form-check-label">Featured</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.portfolio.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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
<script src="{{ asset('js/backend/portfolio/edit.js') }}"></script>
@endsection