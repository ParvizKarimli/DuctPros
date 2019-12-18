<!-- START HEADER -->
<div id="header">
    <div class="container">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">

            <a class="navbar-brand" href="/">
                <img src="assets/images/logo.png" alt="" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headmainmenu" aria-controls="headmainmenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i> Menu
            </button>

            <div class="collapse navbar-collapse" id="headmainmenu">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#contact-us">Contact Us</a>
                    </li>
                    @if(auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" data-animations="fadeInDown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>

    </div>
</div>
<!-- END HEADER -->
