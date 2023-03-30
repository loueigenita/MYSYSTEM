<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('images/logo.png')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{ Auth::user()->name }}</a>
    </div>
</div>

  <!-- SidebarSearch Form -->
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
        </button>
        </div>
    </div>
</div>


<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-header text-warning">Admin Management</li>

      <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
              </p>
          </a>
      </li>

      <li class="nav-item">
          <a href="{{route('profile')}}" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
                  Profile
              </p>
          </a>
      </li>
      <li class="nav-item">
        <a href="{{url('users')}}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Users
            </p>
        </a>
    </li>
  </ul>
</nav>

