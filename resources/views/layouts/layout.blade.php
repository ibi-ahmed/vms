<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="nav-fixed bg-img-repeat overlay overlay-10" style="background-image: url('images/bg.jpeg')" id="app">
    @include('layouts.topbar')
    <div id="layoutSidenav">
        @include('layouts.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @include('layouts.sub_header')
                <x-alerts />
                <div class="container-xl px-4 mt-4">
                    @yield('content')
                </div>
            </main>
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.scripts')
</body>
    
    
