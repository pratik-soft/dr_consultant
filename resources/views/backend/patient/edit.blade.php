@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'patient'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Patient</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.patient.index') }}">Patient</a></li>
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

            <form action="{{ route('backend.patient.update',$patient->id) }}" method="POST" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Edit Patient</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>

                @include('partials.backend.flash-message')
    
                

                <div class="card-body">
                    <div class="form-group row required">
                        <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">                            
                            <input type="text" name="fullname" value="{{ $patient->fullname }}" class="form-control  @error('fullname') is-invalid @enderror" placeholder="Full Name">
                            @error('fullname')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                            <img class="img-thumbnail mb-2" src="{{ getPatientPhoto($patient->photo) }}" style="height:100px">                            
                            <input type="file" name="photo" value="{{ $patient->photo }}" class="form-control  @error('photo') is-invalid @enderror" placeholder="photo">
                            @error('photo')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="position_id" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">                            
                            <select name="position_id" id="position_id" class="form-control">                                
                                <?php
                                foreach($positions as $key=>$val)
                                {
                                    ?><option value="<?php echo $key; ?>" <?php if($patient->position_id == $key){?> selected="selected"<?php } ?>><?php echo $val; ?></option><?php
                                }
                                ?>
                            </select>
                            @error('position_id')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">                            
                            <select name="status" id="status" class="form-control">                                           
                                <option value="">--Please Select--</option>
                                <option value="1" @if($patient->status == '1') selected @endif >Active</option>
                                <option value="0" @if($patient->status == '0') selected @endif >Inactive</option>                                
                            </select>
                            @error('status')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.patient.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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
<script src="{{ asset('js/backend/patient/edit.js') }}"></script>
@endsection