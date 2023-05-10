<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-dark">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Core)-->
                @if (Auth::check()) 
                <div class="sidenav-menu-heading">{{ auth()->user()->role->name }}</div>
                @endif
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link" href="/">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>

                @can('editStaffRole', \App\Models\User::class) 
                <a class="nav-link" href="{{ route('staff.edit.search') }}">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    Edit Staff Role
                </a>
                @endcan

                @can('staffSearch', \App\Models\Appointment::class)
                <a class="nav-link" href="{{ route('appointments.staff-search') }}">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    Staff Appointments
                </a>
                @endcan

                {{-- @can('addTag', \App\Models\Tag::class)
                <a class="nav-link" href="{{ route('tags.add.view') }}">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    Add Visitor Tag
                </a>
                @endcan --}}

                @can('allUsers', \App\Models\User::class) 
                <a class="nav-link" href="{{ route('users.all') }}">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    All Users
                </a>
                @endcan
                
                @can('create', \App\Models\User::class)               
                <a class="nav-link" href="{{ route('user.register') }}">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    Add New User
                </a>
                @endcan

                @can('allAppointments', \App\Models\Appointment::class)
                <a class="nav-link" href="/all-appointments">
                    <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
                    All Appointments
                </a>
                @endcan
                
                @can('recentAppointments', \App\Models\Appointment::class)
                <a class="nav-link" href="/recent-appointments">
                    <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
                    Today's Appointments
                </a>
                @endcan
                
                @can('schedule', \App\Models\Appointment::class)
                <a class="nav-link" href="/schedule-appointment">
                    <div class="nav-link-icon"><i data-feather="bookmark"></i></div>
                    Schedule Appointment
                </a>
                @endcan
                
                @can('myAppointments', \App\Models\Appointment::class)
                <a class="nav-link" href="/my-appointments">
                    <div class="nav-link-icon"><i data-feather="bookmark"></i></div>
                    My Appointments
                </a>
                @endcan

                @can('myVisitors', \App\Models\Visit::class)
                <a class="nav-link" href="/my-visitors">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    My Visitors
                </a>
                @endcan

                @can('add', \App\Models\Visitor::class)
                <a class="nav-link" href="/add-visitor">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    Create Appointment
                </a>
                @endcan

                @can('allVisitors', \App\Models\Visitor::class)
                <a class="nav-link" href="/all-visitor">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    All Visitors
                </a>
                @endcan

                @can('recentVisits', \App\Models\Visit::class)
                <a class="nav-link" href="/recent-visits">
                    <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
                    Today's Visits
                </a>
                @endcan

                @can('taggedVisitors', \App\Models\Visit::class)
                <a class="nav-link" href="/tagged-visitors">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Tagged Visitors
                </a>
                @endcan
                
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            @if (Auth::check())              
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ auth()->user()->role->name }}</div>
                <div class="sidenav-footer-title">{{ auth()->user()->email }}</div>
            </div>
            @endif
        </div>
    </nav>
</div>