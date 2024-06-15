<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Viva Coaching</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Users -->
    <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.list') }}">
            <i class="fas fa fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Coaches -->
    <li class="nav-item {{ Request::is('admin/coaches') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('coachs.list') }}">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span>Coaches</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Subscriptions
    </div>

    <!-- Nav Item - Subscriptions -->
    <li class="nav-item {{ Request::is('admin/subscriptions*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('subscriptions.list') }}" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Subscriptions</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('subscriptions.list') }}">List</a>
                <a class="collapse-item" href="{{ route('subscriptions.add') }}">Add</a>
                <a class="collapse-item" href="">Delete</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Sessions
    </div>

    <!-- Nav Item - Sessions -->
    <li class="nav-item {{ Request::is('admin/sessions*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSessions"
            aria-expanded="true" aria-controls="collapseSessions">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Sessions</span>
        </a>
        <div id="collapseSessions" class="collapse" aria-labelledby="headingSessions" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('sessions.list') }}">List</a>
                <a class="collapse-item" href="{{ route('sessions.add') }}">Add</a>
                <a class="collapse-item" href="#">Delete</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Questionnaires
    </div>

    <!-- Nav Item - Questionnaires -->
    <li class="nav-item {{ Request::is('admin/questionnaires*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuestionnaires"
            aria-expanded="true" aria-controls="collapseQuestionnaires">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Questionnaires</span>
        </a>
        <div id="collapseQuestionnaires" class="collapse" aria-labelledby="headingQuestionnaires" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('questionnaires.index') }}">List</a>
                <a class="collapse-item" href="{{ route('questionnaires.add') }}">Add</a>
                <a class="collapse-item" href="#">Delete</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ (Request::is('admin/profile') || Request::is('admin/profile/edit')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.profile') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Profile</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-5">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
