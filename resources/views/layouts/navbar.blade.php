<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand">{{ (isset($sectionTitle) ? $sectionTitle : '') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                    <!-- Check if we have a signed user -->
                    @auth
                        <li class="{{ request()->is("users/" . auth()->user()->id) ? 'active' : '' }}">
                            <a href="/users/{{ auth()->user()->id }}">
                                <i class="ti-user"></i>
                                <p>{{ auth()->user()->name }}'s' Profile</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <p class="notification">5</p>
                                <p>Notifications</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                            <li><a href="#">Notification 1</a></li>
                            <li><a href="#">Notification 2</a></li>
                            <li><a href="#">Notification 3</a></li>
                            <li><a href="#">Notification 4</a></li>
                            <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->is("users/" . auth()->user()->id . "/applicances") ? 'active' : '' }}">
                                <a href="/users/{{ auth()->user()->id }}/applicances">
                              <i class="ti-clipboard"></i>
                              <p>{{ count(auth()->user()->applicances) }} Applicances</p>
                            </a>
                        </li>
                        <li class="{{ request()->is("users/" . auth()->user()->id . "/companies") ? 'active' : '' }}">
                            <a href="/users/{{ auth()->user()->id }}/companies">
                              <i class="ti-briefcase"></i>
                              <p>{{ count(auth()->user()->companies) }} Companies</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="ti-close"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                @endif
            </ul>

        </div>
    </div>
</nav>