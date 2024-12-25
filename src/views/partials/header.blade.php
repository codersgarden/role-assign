<header class="header d-flex align-items-center bg-white">
    <!-- Logo Section -->
    <div class="logo col-lg-2 d-flex align-items-center">
        <a class="navbar-brand ms-3" href="#">
            <img src="{{ url('roleassign-logo') }}" alt="Logo" class="mb-2">
        </a>
    </div>

    <!-- Vertical Line -->
    <div class="vl border-start mx-2" style="height: 50px;"></div>

    <!-- Back Icon -->
    <div class="col-lg-1 d-flex justify-content-center">
        <a href="#" class="d-flex align-items-center">
            <img src="{{ url('back-icon') }}" alt="Back">
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="col-lg-7 d-flex align-items-center justify-content-start">
        <a class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}"
            href="{{ route('roles.index') }}">Roles</a>
        <a class="nav-link ms-5 {{ request()->routeIs('permissions.*') ? 'active' : '' }}"
            href="{{ route('permissions.index') }}">Permissions</a>
        <a class="nav-link ms-5 {{ request()->routeIs('permission-groups.*') ? 'active' : '' }}"
            href="{{ route('permission-groups.index') }}">Permission Group</a>
    </nav>

    <!-- Settings Icon -->
    <div class="col-lg-2 d-flex justify-content-end pe-5">
        <img src="{{ url('setting-icon') }}" alt="Settings">
    </div>
</header>
