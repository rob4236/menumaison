
<!-- Offcanvas Sidebar -->
@auth

<!-- Bootstrap Offcanvas Sidebar Navigation -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Offcanvas toggle button -->
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarNav" aria-controls="sidebarNav">
            ☰ Menu Maison
        </button>

        <!-- App name on right side -->
        {{-- <span class="navbar-text text-white ms-auto">
            {{ config('app.name', 'Menu Maison') }}
        </span> --}}
    </div>
</nav>

    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarNav" aria-labelledby="sidebarNavLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarNavLabel">{{ config('app.name', 'Menu Maison') }}</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">


                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('profile.edit') }}">{{ __('Account Settings') }}</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white" style="display:inline; cursor:pointer;">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
            </ul>
        </div>
    </div>
@endauth    