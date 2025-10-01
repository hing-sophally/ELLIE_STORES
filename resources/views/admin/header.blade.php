<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar shadow-sm">
    <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
          </ul>

        </form>

    <ul class="navbar-nav ml-auto navbar-right">
        <!-- Notifications -->
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
                <i class="ion ion-ios-bell-outline"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right shadow">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                    <span>Notifications</span>
                    <a href="#" class="text-primary">View All</a>
                </div>
                <div class="dropdown-list-content">
                    @for ($i = 1; $i <= 5; $i++)
                        <a href="#" class="dropdown-item dropdown-item-unread">
                            <img alt="image" src="{{ asset("dist/img/avatar/avatar-$i.jpeg") }}" class="rounded-circle dropdown-item-img">
                            <div class="dropdown-item-desc">
                                <b>User {{ $i }}</b> performed an action
                                <div class="time text-muted small">{{ $i * 2 }} Hours Ago</div>
                            </div>
                        </a>
                    @endfor
                </div>
            </div>
        </li>

        <!-- User Profile -->
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg d-flex align-items-center">
                <i class="ion ion-android-person d-lg-none mr-2"></i>
                <span class="d-none d-lg-inline-block">Hi, {{ Auth::user()->name ?? 'Admin' }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow">
                <a href="#" class="dropdown-item has-icon">
                    <i class="ion ion-android-person"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
