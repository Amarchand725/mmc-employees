<header class="main-header">
    <a href="{{ route('dashboard') }}" class="logo">
        <img src="{{ asset('public/assets/images/logo.png') }}" style="width:130px;position:absolute;left:3%;top:12%;" alt="">
        <span class="logo-lg" style="position:absolute;top:130%;left:3%;">{{ Auth::user()->name }}</span>
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->image)
                            <img src="{{ asset('public/admin/img') }}/{{ Auth::user()->image }}" class="user-image" alt="user photo">
                        @else
                            <img src="{{ asset('public/admin/img/dummy-user.png') }}" class="user-image" alt="user photo">
                        @endif
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div>
                                <a href="{{ route('admin.profile.edit') }}" class="btn btn-default btn-flat">Edit Profile</a>
                            </div>
                            <div>
                                <a class="dropdown-item btn btn-default btn-flat" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>
