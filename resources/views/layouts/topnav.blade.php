<nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand d-none d-sm-block" href="/home">{{ config('app.name', 'Laravel') }}</a>
    <ul class="navbar-nav align-items-center ml-auto">

        @auth
        <li class="nav-item dropdown no-caret mr-3 dropdown-user">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="{{ Gravatar::get(auth()->user()->email) }}"/></a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="{{ Gravatar::get(auth()->user()->email) }}" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{auth()->user()->name}} {{auth()->user()->surname}}</div>
                        <div class="dropdown-user-details-email">{{auth()->user()->email}}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                    @if(Auth::user()->email=="kewrunner@gmail.com")
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('admin-form').submit();">
                            <div class="dropdown-item-icon"><i class="fa fa-arrow-right"></i></div>Admin Panel
                        </a>
                    @endif
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>Logout
                    </a>
                <form id="admin-form" action="{{ url('/admin_dashboard') }}" method="GET" style="display: none;">
                    @csrf
                </form>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @else

        @endif
    </ul>
</nav>
