<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Viva Coaching</div> <!-- Modify the name -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('coach/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('coach.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Client Management
    </div>

    <!-- Nav Item - Client List -->
    <li class="nav-item {{ Request::is('coach/clients*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('coach.users.list') }}">
            <i class="fas fa-users"></i>
            <span>Client List</span>
        </a>
    </li>

    <!-- Nav Item - Coaching Resources -->
    <li class="nav-item {{ Request::is('coach/resources') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('resources.list') }}">
            <i class="fas fa-book"></i>
            <span>Coaching Resources</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        New Features
    </div>

    <!-- Nav Item - Questionnaire -->
    <li class="nav-item {{ Request::is('coach/questionnaire') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('coach.questionnaire') }}">
            <i class="fas fa-question-circle"></i>
            <span>Questionnaire</span>
        </a>
    </li>

    <!-- Nav Item - Upcoming Sessions -->
    <li class="nav-item {{ Request::is('coach/upcoming-sessions') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('coach.upcomingSessions') }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Upcoming Sessions</span>
        </a>
    </li>

  

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ Request::is('coach/profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('coach.profile') }}">
            <i class="fas fa-table"></i>
            <span>Profile</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
