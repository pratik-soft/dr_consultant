@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'settings'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>                            
                            <li class="breadcrumb-item active">Settings</li>
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
                <form action="{{ route('backend.settings.store') }}" method="POST" id="addForm" enctype="multipart/form-data">
                    @csrf            
                    <div class="row">
                        <div class="col-md-6">                
                            <!-- Default box -->            
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                                    </div>
                                </div>                

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="site_name" class="col-sm-3 col-form-label">Site Name</label>
                                        <div class="col-sm-9">                            
                                            <input id="site_name" type="text" name="site_name" value="<?php echo (isset($settings['site_name'])) ? $settings['site_name'] : ''; ?>" class="form-control @error('site_name') is-invalid @enderror" placeholder="Site Name">
                                            @error('site_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="site_logo" class="col-sm-3 col-form-label">Site Logo</label>
                                        <div class="col-sm-9">                            
                                            <img class="img-thumbnail mb-2" src="{{ getSiteLogo(isset($settings['site_logo']) ? $settings['site_logo'] : '') }}" style="height:100px">
                                            <input id="site_logo" type="file" name="site_logo" value="<?php echo (isset($settings['site_logo'])) ? $settings['site_logo'] : ''; ?>" class="form-control @error('site_logo') is-invalid @enderror" placeholder="Site Logo">
                                            @error('site_logo')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="favicon" class="col-sm-3 col-form-label">Favicon</label>
                                        <div class="col-sm-9">                            
                                            <img class="img-thumbnail mb-2" src="{{ getFavicon(isset($settings['favicon']) ? $settings['favicon'] : '') }}" style="height:50px">
                                            <input id="favicon" type="file" name="favicon" value="<?php echo (isset($settings['favicon'])) ? $settings['favicon'] : ''; ?>" class="form-control @error('favicon') is-invalid @enderror" placeholder="Favicon">
                                            @error('favicon')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-3 col-form-label">Color</label>
                                        <div class="col-sm-9">                            
                                            <div class="input-group colorpicker1">
                                                <?php $color = (isset($settings['color'])) ? $settings['color'] : '#4154f1'; ?>
                                                <input id="color" type="text" name="color" value="{{ $color }}" class="form-control @error('color') is-invalid @enderror" placeholder="Color">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-square" style="color:{{ $color }}"></i></span>
                                                </div>
                                            </div>
                                            @error('color')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hover_color" class="col-sm-3 col-form-label">Hover Color</label>
                                        <div class="col-sm-9">                            
                                            <div class="input-group colorpicker2">
                                                <?php $hover_color = (isset($settings['hover_color'])) ? $settings['hover_color'] : '#5969f3'; ?>
                                                <input id="hover_color" type="text" name="hover_color" value="{{ $hover_color }}" class="form-control @error('hover_color') is-invalid @enderror" placeholder="Hover Color">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-square" style="color:{{ $hover_color }}"></i></span>
                                                </div>
                                            </div>
                                            @error('hover_color')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="version" class="col-sm-3 col-form-label">Version</label>
                                        <div class="col-sm-9">                            
                                            <input id="version" type="text" name="version" value="<?php echo (isset($settings['version'])) ? $settings['version'] : ''; ?>" class="form-control @error('version') is-invalid @enderror" placeholder="Version">
                                            @error('version')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                    
                                </div>
                                <!-- /.card-body -->                                
                                
                                <!-- /.card-footer-->
                            </div>            
                            <!-- /.card -->            

                            <!-- Default box -->            
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Information</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                                    </div>
                                </div>                

                                <div class="card-body">                                    
                                    <div class="form-group row">
                                        <label for="google_map_url" class="col-sm-3 col-form-label">Google Map URL</label>
                                        <div class="col-sm-9">                            
                                            <input id="google_map_url" type="text" name="google_map_url" value="<?php echo (isset($settings['google_map_url'])) ? $settings['google_map_url'] : ''; ?>" class="form-control @error('google_map_url') is-invalid @enderror" placeholder="Google Map URL">
                                            @error('google_map_url')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">                            
                                            <input id="email" type="text" name="email" value="<?php echo (isset($settings['email'])) ? $settings['email'] : ''; ?>" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                            @error('email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                    
                                    <div class="form-group row">
                                        <label for="alternate_email" class="col-sm-3 col-form-label">Alternate Email</label>
                                        <div class="col-sm-9">                            
                                            <input id="alternate_email" type="text" name="alternate_email" value="<?php echo (isset($settings['alternate_email'])) ? $settings['alternate_email'] : ''; ?>" class="form-control @error('alternate_email') is-invalid @enderror" placeholder="Alternate Email">
                                            @error('alternate_email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">                            
                                            <input id="phone" type="text" name="phone" value="<?php echo (isset($settings['phone'])) ? $settings['phone'] : ''; ?>" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                            @error('phone')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alternate_phone" class="col-sm-3 col-form-label">Alternate Phone</label>
                                        <div class="col-sm-9">                            
                                            <input id="alternate_phone" type="text" name="alternate_phone" value="<?php echo (isset($settings['alternate_phone'])) ? $settings['alternate_phone'] : ''; ?>" class="form-control @error('alternate_phone') is-invalid @enderror" placeholder="Alternate Phone">
                                            @error('alternate_phone')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" rows="3" name="address" placeholder="Address"><?php echo (isset($settings['address'])) ? $settings['address'] : ''; ?></textarea>
                                            @error('address')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="open_hours_days" class="col-sm-3 col-form-label">Open Hours Days</label>
                                        <div class="col-sm-9">                            
                                            <input id="open_hours_days" type="text" name="open_hours_days" value="<?php echo (isset($settings['open_hours_days'])) ? $settings['open_hours_days'] : ''; ?>" class="form-control @error('open_hours_days') is-invalid @enderror" placeholder="Open Hours Days">
                                            @error('open_hours_days')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="open_hours_time" class="col-sm-3 col-form-label">Open Hours Time</label>
                                        <div class="col-sm-9">                            
                                            <input id="open_hours_time" type="text" name="open_hours_time" value="<?php echo (isset($settings['open_hours_time'])) ? $settings['open_hours_time'] : ''; ?>" class="form-control @error('open_hours_time') is-invalid @enderror" placeholder="Open Hours Time">
                                            @error('open_hours_time')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                                        
                                </div>
                                <!-- /.card-body -->                                
                                
                                <!-- /.card-footer-->
                            </div>            
                            <!-- /.card -->            
                            
                        </div>
                        <div class="col-md-6">                
                            <!-- Default box -->            
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">SEO</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                                    </div>
                                </div>                

                                <div class="card-body">                                    
                                    
                                    <div class="form-group row">
                                        <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                                        <div class="col-sm-9">                            
                                            <input id="meta_title" type="text" name="meta_title" value="<?php echo (isset($settings['meta_title'])) ? $settings['meta_title'] : ''; ?>" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title">
                                            @error('meta_title')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_keywords" class="col-sm-3 col-form-label">Meta Keywords</label>
                                        <div class="col-sm-9">
                                            <textarea id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" rows="3" name="meta_keywords" placeholder="Meta Keywords"><?php echo (isset($settings['meta_keywords'])) ? $settings['meta_keywords'] : ''; ?></textarea>
                                            @error('meta_keywords')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_description" class="col-sm-3 col-form-label">Meta Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="3" name="meta_description" placeholder="Meta Description"><?php echo (isset($settings['meta_description'])) ? $settings['meta_description'] : ''; ?></textarea>
                                            @error('meta_description')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                                    

                                </div>
                                <!-- /.card-body -->                                
                                
                                <!-- /.card-footer-->
                            </div>            
                            <!-- /.card -->  

                            <!-- Default box -->            
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Social Media</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                                    </div>
                                </div>                

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                                        <div class="col-sm-9">                            
                                            <input id="twitter" type="text" name="twitter" value="<?php echo (isset($settings['twitter'])) ? $settings['twitter'] : ''; ?>" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter">
                                            @error('twitter')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
                                        <div class="col-sm-9">                            
                                            <input id="instagram" type="text" name="instagram" value="<?php echo (isset($settings['instagram'])) ? $settings['instagram'] : ''; ?>" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram URL">
                                            @error('instagram')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="skype" class="col-sm-3 col-form-label">skype</label>
                                        <div class="col-sm-9">                            
                                            <input id="skype" type="text" name="skype" value="<?php echo (isset($settings['skype'])) ? $settings['skype'] : ''; ?>" class="form-control @error('skype') is-invalid @enderror" placeholder="skype">
                                            @error('skype')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                                        <div class="col-sm-9">                            
                                            <input id="facebook" type="text" name="facebook" value="<?php echo (isset($settings['facebook'])) ? $settings['facebook'] : ''; ?>" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook URL">
                                            @error('facebook')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="linkedin" class="col-sm-3 col-form-label">LinkedIn</label>
                                        <div class="col-sm-9">                            
                                            <input id="linkedin" type="text" name="linkedin" value="<?php echo (isset($settings['linkedin'])) ? $settings['linkedin'] : ''; ?>" class="form-control @error('linkedin') is-invalid @enderror" placeholder="LinkedIn URL">
                                            @error('linkedin')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="youtube" class="col-sm-3 col-form-label">Youtube</label>
                                        <div class="col-sm-9">                            
                                            <input id="youtube" type="text" name="youtube" value="<?php echo (isset($settings['youtube'])) ? $settings['youtube'] : ''; ?>" class="form-control @error('youtube') is-invalid @enderror" placeholder="Youtube URL">
                                            @error('youtube')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                                                                                                    
                                    <div class="form-group row">
                                        <label for="android_app" class="col-sm-3 col-form-label">Android App</label>
                                        <div class="col-sm-9">                            
                                            <input id="android_app" type="text" name="android_app" value="<?php echo (isset($settings['android_app'])) ? $settings['android_app'] : ''; ?>" class="form-control @error('android_app') is-invalid @enderror" placeholder="Android App URL">
                                            @error('android_app')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                                                                                                    
                                    <div class="form-group row">
                                        <label for="ios_app" class="col-sm-3 col-form-label">iOS App</label>
                                        <div class="col-sm-9">                            
                                            <input id="ios_app" type="text" name="ios_app" value="<?php echo (isset($settings['ios_app'])) ? $settings['ios_app'] : ''; ?>" class="form-control @error('ios_app') is-invalid @enderror" placeholder="iOS App URL">
                                            @error('ios_app')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                                                                                                    
                                </div>
                                <!-- /.card-body -->
                                
                                <!-- /.card-footer-->
                            </div>            
                            <!-- /.card -->                             
                        
                            <!-- Default box -->            
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Counts</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                                    </div>
                                </div>                

                                <div class="card-body">                                    
                                    <div class="form-group row">
                                        <label for="happy_clients" class="col-sm-3 col-form-label">Happy Clients</label>
                                        <div class="col-sm-9">                            
                                            <input id="happy_clients" type="number" name="happy_clients" value="<?php echo (isset($settings['happy_clients'])) ? $settings['happy_clients'] : ''; ?>" class="form-control @error('happy_clients') is-invalid @enderror" placeholder="Happy Clients">
                                            @error('happy_clients')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="projects" class="col-sm-3 col-form-label">Projects</label>
                                        <div class="col-sm-9">                            
                                            <input id="projects" type="number" name="projects" value="<?php echo (isset($settings['projects'])) ? $settings['projects'] : ''; ?>" class="form-control @error('projects') is-invalid @enderror" placeholder="Projects">
                                            @error('projects')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hours_of_support" class="col-sm-3 col-form-label">Hours of Support</label>
                                        <div class="col-sm-9">                            
                                            <input id="hours_of_support" type="number" name="hours_of_support" value="<?php echo (isset($settings['hours_of_support'])) ? $settings['hours_of_support'] : ''; ?>" class="form-control @error('hours_of_support') is-invalid @enderror" placeholder="Hours of Support">
                                            @error('hours_of_support')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="team_strength" class="col-sm-3 col-form-label">Team Strength</label>
                                        <div class="col-sm-9">                            
                                            <input id="team_strength" type="number" name="team_strength" value="<?php echo (isset($settings['team_strength'])) ? $settings['team_strength'] : ''; ?>" class="form-control @error('team_strength') is-invalid @enderror" placeholder="Team Strength">
                                            @error('team_strength')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                    
                                </div>
                                <!-- /.card-body -->                                
                                
                                <!-- /.card-footer-->
                            </div>            
                            <!-- /.card -->            
                        </div>
                    </div>
                    <!-- /.end of row -->
                    <div class="row pb-3">
                        <div class="col-12">                            
                            <button type="submit" id="addBtn" class="btn btn-primary float-right"> Save All Settings</button>
                        </div>
                    </div>
                </form>
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
<script src="{{ asset('js/backend/settings/index.js') }}"></script>
@endsection