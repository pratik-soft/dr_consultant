<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item active">
                <a href="{{ route('backend.myaccount.index') }}" class="nav-link @isset($myaccountMenu) @if($myaccountMenu == 'profile_information') active @endif @endisset">
                    <i class="fas fa-user"></i> Profile Information
                </a>
            </li>
            <li class="nav-item active">
                <a href="{{ route('backend.myaccount.profile') }}" class="nav-link @isset($myaccountMenu) @if($myaccountMenu == 'update_profile') active @endif @endisset">
                    <i class="fas fa-edit"></i> Update Profile                    
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.myaccount.change_password') }}" class="nav-link @isset($myaccountMenu) @if($myaccountMenu == 'change_password') active @endif @endisset">
                    <i class="fas fa-key"></i> Change Password
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.myaccount.change_avatar') }}" class="nav-link @isset($myaccountMenu) @if($myaccountMenu == 'change_avatar') active @endif @endisset">
                    <i class="far fa-image"></i> Change Avatar
                </a>
            </li>            
            <li class="nav-item">
                <a href="{{ route('backend.myaccount.logged_in_devices') }}" class="nav-link @isset($myaccountMenu) @if($myaccountMenu == 'logged_in_devices') active @endif @endisset">
                    <i class="fas fa-sign-out-alt"></i> Logged In Devices
                </a>
            </li>
        </ul>
    </div>
    <!-- /.card-body -->
</div>