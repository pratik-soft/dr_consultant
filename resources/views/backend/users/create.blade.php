@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'users'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.users.index') }}">Users</a></li>
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
            <form action="{{ route('backend.users.store') }}" method="POST" id="addForm">
                @csrf
            <!-- Default box -->            
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">Add User</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>                
    
                

                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="add-user-basic-details-tab" data-toggle="pill" href="#add-user-basic-details" role="tab" aria-controls="add-user-basic-details" aria-selected="true">Basic Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="add-user-roles-and-permissions-tab" data-toggle="pill" href="#add-user-roles-and-permissions" role="tab" aria-controls="add-user-roles-and-permissions" aria-selected="false">Roles and Permissions</a>
                        </li>                        
                    </ul>
                    <div class="tab-content tab-validate" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="add-user-basic-details" role="tabpanel" aria-labelledby="add-user-basic-details-tab">
                            <div class="form-group row required">
                                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">                            
                                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                                    @error('first_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">                            
                                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                                    @error('last_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                    @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                    @error('phone')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">                            
                                    <input id="password" type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">                            
                                    <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                    @error('password_confirmation')
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
                                        <option value="" <?php if($old_status == ''){?> selected="selected"<?php } ?>>--Please Select--</option>
                                        <option value="1" <?php if($old_status == 1){?> selected="selected"<?php } ?>>Active</option>
                                        <option value="2" <?php if($old_status == 2){?> selected="selected"<?php } ?>>Inactive</option>
                                        <option value="3" <?php if($old_status == 3){?> selected="selected"<?php } ?>>Deleted</option>
                                        <option value="4" <?php if($old_status == 4){?> selected="selected"<?php } ?>>Blocked</option>
                                    </select>
                                    @error('status')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="add-user-roles-and-permissions" role="tabpanel" aria-labelledby="add-user-roles-and-permissions-tab">
                            <div class="form-group row required">
                                <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10">
                                    <?php 
                                        $old_roles = old('roles');                                
                                    ?>                            
                                    <select name="roles[]" id="roles" class="form-control" multiple>                                           
                                        <?php
                                        foreach($roles as $key=>$role)
                                        {
                                            ?><option value="<?php echo $key; ?>" <?php if($old_roles && in_array($role, $old_roles) == 1){?> selected="selected"<?php } ?>><?php echo $role; ?></option><?php
                                        }
                                        ?>
                                    </select>
                                    @error('roles')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="roles" class="col-sm-2 col-form-label">Extra Permissions</label>
                                <div class="col-sm-10">                            
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <button type="button" class="btn btn-default btn-sm checkAll" value="Check All" /><i class="fa fa-check"></i> Check All</button>
                                            <button type="button" class="btn btn-default btn-sm unCheckAll" value="Uncheck All" /><i class="fa fa-times"></i> Uncheck All</button>
                                        </div>
                                        <div class="col-md-12"><!--<b>Common</b>--></div>
                                        @php ($rolePrefixes = [])
                                        @foreach($permissions as $value)                                    
                                            @if (strpos($value->name, 'blog-') !== false && !in_array('blog-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'blog-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Blog</h6>                                            
                                                </div>
                                            @endif                                            
                                            @if (strpos($value->name, 'inquiry-') !== false && !in_array('inquiry-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'inquiry-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Inquiries</h6>
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'product-') !== false && !in_array('product-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'product-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Products</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'permission-') !== false && !in_array('permission-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'permission-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Permissions</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'role-') !== false && !in_array('role-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'role-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Roles</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'user-') !== false && !in_array('user-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'user-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Users</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'categories-') !== false && !in_array('categories-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'categories-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Categories</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'client-') !== false && !in_array('client-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'client-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Clients</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'faq-') !== false && !in_array('faq-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'faq-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>FAQ</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'portfolio-') !== false && !in_array('portfolio-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'portfolio-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Portfolio</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'position-') !== false && !in_array('position-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'position-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Positions</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'services-') !== false && !in_array('services-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'services-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Services</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'subscriber-') !== false && !in_array('subscriber-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'subscriber-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Subscribers</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'team-') !== false && !in_array('team-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'team-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Team</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'testimonial-') !== false && !in_array('testimonial-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'testimonial-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Testimonials</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'tags-') !== false && !in_array('tags-', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'tags-')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Tags</h6>                                            
                                                </div>
                                            @endif
                                            @if (strpos($value->name, 'settings') !== false && !in_array('settings', $rolePrefixes))
                                                @php ($rolePrefixes[] = 'settings')
                                                <div class="col-md-12 text-secondary">
                                                    <hr>
                                                    <h6>Settings</h6>                                            
                                                </div>
                                            @endif
                                            <div class="col-md-3">
                                                <label style="font-weight: normal">
                                                <input type="checkbox" name="permissions[]" value="{{ $value->id }}">
                                                {{ $value->name }}
                                                </label>
                                            </div>                                                                                    
                                        @endforeach                            
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    
                    
                    
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.users.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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
<script>
var role_permissions = JSON.parse('<?= json_encode($role_permissions); ?>');
</script>
<script src="{{ asset('js/backend/users/create.js') }}"></script>
@endsection