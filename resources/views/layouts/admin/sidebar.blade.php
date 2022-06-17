<aside class="main-sidebar"  style="top:10%;">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>
            @can('page-list')
            <li class="treeview">
                <a href="{{ route('page.index') }}" class="{{ request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : '' }}">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>
            @endcan
            <li class="treeview">
                @php
                    $mail_setting = App\Models\MailSetting::orderby('id', 'desc')->first();
                @endphp
                @if($mail_setting)
                    <a class="nav-link {{ request()->is('mail_setting.edit') ? 'active' : '' }}" href="{{ route('mail_setting.edit', $mail_setting->id) }}">
                @else
                    <a class="nav-link {{ request()->is('mail_setting.create') ? 'active' : '' }}" href="{{ route('mail_setting.create') }}">
                @endif
                    <i class="fa fa-cog"></i>
                    <span class="nav-link-text">{{ __('Mail Settings') }}</span>
                </a>
            </li>
            @can('role-list')
            <li class="treeview">
                <a href="{{ route('role.index') }}" class="{{ request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-tasks"></i> <span>Roles</span>
                </a>
            </li>
            @endcan
            <li class="treeview">
                <a href="{{ route('user.index') }}" class="{{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-users"></i> <span>Employees</span>
                </a>
            </li>
            @can('permission-list')
            <li class="treeview">
                <a href="{{ route('permission.index') }}" class="{{ request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-lock"></i> <span>Permissions</span>
                </a>
            </li>
            @endcan

            {{-- <li class="treeview">
                <a href="{{ route('employee.index') }}" class="{{ request()->is('employee') || request()->is('employee/create') || request()->is('employee/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-lock"></i> <span>Employees</span>
                </a>
            </li> --}}
        </ul>
    </section>
</aside>
