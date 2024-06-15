<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Le reste de votre contenu -->


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Viva Coaching</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('user/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        My Progress
    </div>

    <!-- Nav Item - My Goals -->
    <li class="nav-item {{ Request::is('user/goals*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.goals') }}">
            <i class="fas fa-bullseye"></i>
            <span>My Goals</span>
        </a>
    </li>

    <!-- Nav Item - My Achievements -->
    <li class="nav-item {{ Request::is('user/achievements*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.achievements') }}">
            <i class="fas fa-medal"></i>
            <span>My Achievements</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        My Subscriptions
    </div>

    <!-- Nav Item - Subscriptions -->
    <li class="nav-item {{ Request::is('user/subscriptions') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('user.subscriptions.list') }}" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Subscriptions</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.subscriptions.list') }}">List</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Coaching Sessions
    </div>

    <!-- Nav Item - Upcoming Sessions -->
    <li class="nav-item {{ Request::is('user/sessions/upcoming*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.sessions.upcoming') }}">
            <i class="far fa-calendar-alt"></i>
            <span>Upcoming Sessions</span>
        </a>
    </li>

    <!-- Nav Item - Past Sessions -->
    <li class="nav-item {{ Request::is('user/sessions/past*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.sessions.past') }}">
            <i class="far fa-calendar-check"></i>
            <span>Past Sessions</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Account Settings
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ Request::is('user/profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.profile') }}">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    <!-- Nav Item - Change Password -->
    <li class="nav-item {{ Request::is('user/password/change') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.password.change') }}">
            <i class="fas fa-key"></i>
            <span>Change Password</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Questionnaire
    </div>

    <!-- Nav Item - Questionnaire -->
    <li class="nav-item {{ Request::is('user/questionnaire*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.questionnaires.list') }}">
            <i class="fas fa-question-circle"></i>
            <span>Questionnaire</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
