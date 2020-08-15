<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="\">

        <div class="sidebar-brand-icon rotate-n-15">
            <br>
            <i class="fas fa-stethoscope"></i>

        </div>
        <div class="sidebar-brand-text mx-3"><br>iCancer</div>
    </a>
    <br>
    <img class="img-profile rounded-circle mx-5" src="https://source.unsplash.com/7bMdiIqz_J4/125x125">
    <div class="sidebar-brand-text text-white text-md-center text-capitalize mx-3"><br>Hi, {{ Auth::user()->name }}!</div>
{{--    <div class="sidebar-brand-text text-white text-md-center mx-3"><br>You are an {{ Auth::user()->role }}</div>--}}
    <br>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="\">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}

    <!-- Nav Item - Report -->
    <li class="nav-item">
        <a class="nav-link" href="\reports">
            <i class="fas fa-fw fa-table"></i>
            @if(Auth::user()->role == 'nurse')
                <span>History</span></a>
        @endif
        @if(Auth::user()->role == 'consultant')
            <span>History</span></a>
        @endif
        @if(Auth::user()->role == 'admin')
            <span>Patients</span></a>
        @endif
    </li>

    <!-- Nav Item - Tables -->
        <li class="nav-item active">
            <a class="nav-link" href="\users">
                <i class="fas fa-user fa-cog"></i>
                <span>User Management</span>
            </a>
        </li>

    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="\settings">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>

    <!-- Divider -->
{{--    <hr class="sidebar-divider d-none d-md-block">--}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
{{--        <button class="rounded-circle border-0" id="sidebarToggle"></button>--}}
    </div>

</ul>
