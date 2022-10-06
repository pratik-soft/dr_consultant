@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'roles'])
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.roles.index') }}">Roles</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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

            <form action="{{ route('backend.roles.update',$role->id) }}" method="POST" id="editForm">
                @csrf
                @method('PUT') 
            <!-- Default box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Edit Role</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row required">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">                            
                            <input id="name" type="text" name="name" value="{{ $role->name }}" class="form-control  @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Permissions</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div id="divCheckAll">
                                        <input type="checkbox" name="checkall" id="checkall" onClick="check_uncheck_checkbox(this.checked);" /> Select All
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @php ($rolePrefixes = [])
                                @foreach($permissions as $value)
                                    @if (strpos($value->name, 'blog-') !== false && !in_array('blog-', $rolePrefixes))
                                        @php ($rolePrefixes[] = 'blog-')
                                        <div class="col-md-12 text-secondary">
                                            <hr>
                                            <h6>Blog</h6>                                            
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
                                    <div class="col-md-3">
                                        <input type="checkbox" class="form-check-input1" id="role-{{ $value->id }}" name="permission[]" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="role-{{ $value->id }}">{{ $value->name }}</label>                            
                                    </div>
                                @endforeach                                
                            </div>                            
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">                    
                    <a type="button" class="btn btn-default" href="{{ route('backend.roles.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
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
<script src="{{ asset('js/backend/roles/edit.js') }}"></script>
@endsection