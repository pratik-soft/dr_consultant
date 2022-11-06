    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('backend.dashboard.index') }}" class="brand-link">
            <img src="{{ asset('themes/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ $settings['site_name'] }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('themes/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('backend.dashboard.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'dashboard') active @endif @endisset">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard                                
                            </p>
                        </a>                        
                    </li>


                    <!-- <li class="nav-item">
                        <a href="{{ route('backend.form.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'form') active @endif @endisset">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Form                                
                            </p>
                        </a>                        
                    </li> -->

                    <?php 
                    $canPatient = auth()->user()->can('patient-list');
                    
                    if($canPatient)
                    {
                    ?>

                    <li class="nav-item">
                        <a href="{{ route('backend.patient.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'patient') active @endif @endisset">
                            <i class="fas fa-users nav-icon"></i>
                            <p>
                                For Doctor                                
                            </p>
                        </a>                        
                    </li>
                    <?php 
                    }
                    ?>

                    <li class="nav-header">GENERAL</li>

                    <?php 
                        $canUsers = auth()->user()->can('user-list');
                        $canRoles = auth()->user()->can('role-list');
                        $canPermissions = auth()->user()->can('permission-list');

                        if($canUsers || $canRoles || $canPermissions)
                        {
                    ?>
                    <li class="nav-item @isset($asideSelected) @if($asideSelected == 'permissions' || $asideSelected == 'roles' || $asideSelected == 'users') menu-open @endif @endisset">
                        <a href="{{ route('backend.permissions.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'permissions' || $asideSelected == 'roles' || $asideSelected == 'users') active @endif @endisset">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Authentication
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if($canUsers){ ?>
                            <li class="nav-item">
                                <a href="{{ route('backend.users.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'users') active @endif @endisset">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($canRoles){ ?>
                            <li class="nav-item">
                                <a href="{{ route('backend.roles.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'roles') active @endif @endisset">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($canPermissions){ ?>
                            <li class="nav-item">
                                <a href="{{ route('backend.permissions.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'permissions') active @endif @endisset">
                                    <i class="fas fa-key nav-icon"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php 
                        }
                    ?>

                    @can('settings')
                    <li class="nav-item">
                        <a href="{{ route('backend.settings.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'settings') active @endif @endisset">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                    @endcan

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>