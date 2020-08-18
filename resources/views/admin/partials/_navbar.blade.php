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
    <div class="sidebar-brand-text text-white text-md-center text-capitalize mx-3 mb-2"><br>Hi, {{ Auth::user()->name }}!</div>
    @if(Auth::user()->role == 'admin')
        <div class="sidebar-brand-text text-gray-400 text-md-center mx-3">Administrator</div>
    @endif
    @if(Auth::user()->role == 'consultant')
        <div class="sidebar-brand-text text-gray-400 text-md-center mx-3">Consultant</div>
    @endif
    @if(Auth::user()->role == 'nurse')
        <div class="sidebar-brand-text text-gray-400 text-md-center mx-3">Nurse</div>
    @endif
{{--    <div class="sidebar-brand-text text-white text-md-center mx-3"><br>You are an {{ Auth::user()->role }}</div>--}}
    <br>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="\">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}
    @if(Auth::user()->role === 'consultant' or  Auth::user()->role === 'nurse')
    <!-- Nav Item - Patients -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.index') }}">
                <i class="fas fa-fw fa-person-booth"></i>
                <span>Patients</span></a>
        </li>
    @endif

    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}
    @if(Auth::user()->role === 'consultant' or  Auth::user()->role === 'nurse')
        <!-- Nav Item - Forms -->
        <li class="nav-item">
            <a class="nav-link" href="\forms">
                <i class="fas fa-fw fa-pen-alt"></i>
                <span>Forms</span></a>
        </li>
    @endif
    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}

    <!-- Nav Item - Report -->
    <li class="nav-item">
        <a class="nav-link" href="\reports">
            <i class="fas fa-fw fa-table"></i>
            @if(Auth::user()->role == 'nurse' or Auth::user()->role == 'consultant')
                <span>History</span></a>
            @endif
            @if(Auth::user()->role == 'admin')
                <span>Patients</span></a>
            @endif
    </li>

    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}

    <!-- Nav Item - Tables -->
    @if(Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="\users">
                <i class="fas fa-user fa-cog"></i>
                <span>User Management</span></a>
        </li>
    @endif

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
