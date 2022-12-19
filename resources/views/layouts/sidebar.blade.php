<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-dark">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                {{-- <div class="sidenav-menu-heading d-sm-none">Account</div> --}}
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                {{-- <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a> --}}
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                {{-- <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a> --}}
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">{{ auth()->user()->type }}</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link" href="/">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
                @if(Auth::user()->type == 'admin' || Auth::user()->type == 'super')
                <a class="nav-link" href="{{ route('user.register') }}">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    Add New User
                </a>
                @endif

                @if(Auth::user()->type !== 'staff')
                <a class="nav-link" href="/all-appointments">
                    <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
                    All Appointments
                </a>
                @endif
                
                @if(Auth::user()->type !== 'user')
                <a class="nav-link" href="/schedule-appointment">
                    <div class="nav-link-icon"><i data-feather="bookmark"></i></div>
                    Schedule Appointment
                </a>
                
                <a class="nav-link" href="/my-appointments">
                    <div class="nav-link-icon"><i data-feather="bookmark"></i></div>
                    My Appointments
                </a>
                @endif

                @if(Auth::user()->type !== 'staff')
                <a class="nav-link" href="/add-visitor">
                    <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                    Create Appointment
                </a>
                @endif
                @if(Auth::user()->type == 'super' || Auth::user()->type == 'admin')
                <a class="nav-link" href="/all-visitor">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    All Visitors
                </a>
                @endif
                @if(Auth::user()->type !== 'staff')
                <a class="nav-link" href="/tagged-visitors">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Tagged Visitors
                </a>
                @endif
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</div>
            </div>
        </div>
    </nav>
</div>