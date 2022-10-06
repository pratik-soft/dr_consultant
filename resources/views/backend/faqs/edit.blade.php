@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'faqs'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>FAQ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.faqs.index') }}">FAQ</a></li>
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

            <form action="{{ route('backend.faqs.update',$faq->id) }}" method="POST" id="editForm">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Edit FAQ</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>

                @include('partials.backend.flash-message')
    
                

                <div class="card-body">
                    <div class="form-group row required">
                        <label for="question" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">                            
                            <input type="text" name="question" value="{{ $faq->question }}" class="form-control  @error('question') is-invalid @enderror" placeholder="Question">
                            @error('question')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="answer" class="col-sm-2 col-form-label">Answer</label>
                        <div class="col-sm-10">
                            <textarea class="form-control  @error('answer') is-invalid @enderror" rows="5" name="answer" placeholder="Answer">{{ $faq->answer }}</textarea>
                            @error('answer')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">                            
                            <select name="status" id="status" class="form-control">                                           
                                <option value="">--Please Select--</option>
                                <option value="1" @if($faq->status == '1') selected @endif >Active</option>
                                <option value="0" @if($faq->status == '0') selected @endif >Inactive</option>                                
                            </select>
                            @error('status')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.faqs.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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
<script src="{{ asset('js/backend/faqs/edit.js') }}"></script>
@endsection