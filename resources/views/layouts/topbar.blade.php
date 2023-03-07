<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <div>
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="/">NMDPRA VMS</a>
        <img src="{{ asset('/images/logo-small.png') }}" alt="Logo" height="35" width="35">
    </div>
    {{-- @if (Auth::check())
    <a class="navbar-brand pe-3 ps-4 ps-lg-2 ml-10">{{ Auth::user()->name }}</a>
    @endif --}}
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- User Dropdown-->
        
        @if (Auth::check())
        <a class="navbar-brand pe-3 ps-4 ps-lg-2 ml-10">{{ Auth::user()->name }}</a>
            @can('userProfile', \App\Models\User::class)
                <li class="nav-item no-caret me-3">
                    <a class="btn" href="{{ route('user.profile') }}">Profile</a>
                </li>
        @endcan    
        <li class="nav-item no-caret me-3 me-lg-4">
            <a class="btn" id="navbarDropdownUserImage" role="button" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        @endif
    </ul>
</nav>