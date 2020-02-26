<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">simkar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('active-dashboard')">
        <a class="nav-link" href="{{ url('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item @yield('active-employee')">
        <a class="nav-link" href="{{ route('employee.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Employee</span></a>
    </li>

    <li class="nav-item @yield('active-education')">
        <a class="nav-link" href="{{ route('education.index') }}">
        <i class="fas fa-fw fa-spinner"></i>
        <span>Education</span></a>
    </li>

    <li class="nav-item @yield('active-position')">
        <a class="nav-link" href="{{ route('position.index') }}">
        <i class="fas fa-fw fa-hotel"></i>
        <span>Position</span></a>
    </li>

    <li class="nav-item @yield('active-status')">
        <a class="nav-link" href="{{ route('status.index') }}">
        <i class="fas fa-fw fa-check"></i>
        <span>Status</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>