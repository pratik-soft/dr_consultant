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

                    @can('team-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.team.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'team') active @endif @endisset">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Team
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('patient-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.patient.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'patient') active @endif @endisset">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Patient
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('testimonial-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.testimonials.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'testimonials') active @endif @endisset">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                Testimonials
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('client-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.clients.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'clients') active @endif @endisset">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                Clients
                            </p>
                        </a>
                    </li>
                    @endcan                    

                    @can('services-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.services.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'services') active @endif @endisset">
                            <i class="nav-icon fas fa-wrench"></i>
                            <p>
                                Services
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('portfolio-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.portfolio.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'portfolio') active @endif @endisset">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Portfolio
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('faq-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.faqs.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'faqs') active @endif @endisset">
                            <i class="nav-icon fas fa-question"></i>
                            <p>
                                FAQ
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('blog-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.blog.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'blog') active @endif @endisset">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Blog
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('inquiry-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.inquiries.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'inquiries') active @endif @endisset">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>
                                Inquiries
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('subscriber-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.subscribers.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'subscribers') active @endif @endisset">
                            <i class="nav-icon fas fa-envelope-square"></i>
                            <p>
                                Subscribers
                            </p>
                        </a>
                    </li>
                    @endcan

                    <li class="nav-header">GENERAL</li>

                    @can('categories-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.categories.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'categories') active @endif @endisset">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('tags-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.tags.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'tags') active @endif @endisset">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Tags
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('position-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.positions.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'positions') active @endif @endisset">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Positions
                            </p>
                        </a>
                    </li>
                    @endcan

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

                    <li class="nav-header">DUMMIES</li>

                    @can('product-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.products.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'products') active @endif @endisset">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('dummies-list')
                    <li class="nav-item">
                        <a href="{{ route('backend.dummies.index') }}" class="nav-link @isset($asideSelected) @if($asideSelected == 'dummies') active @endif @endisset">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                Dummies
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