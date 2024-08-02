@if(auth()->check() && auth()->user()->is_admin)
<nav class="navbar navbar-expand-lg navbar-light bg-success">
@else
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
@endif
    <div class="container">
        <a class="navbar-brand" href="/" style='color: white'>
            Perpus
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style='color: white'>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" style='color: white'>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.all') }}" style='color: white'>
                        All Books
                    </a>
                </li>

                @if(request()->is('books'))
                <li class="nav-item">
                    <button type="button" class="btn btn-link nav-link" id="showElementBtn" style="color: white">
                        <i class="ti ti-search"></i>
                        Search books
                    </button>
                </li>
                @endif

                @if (auth()->check() && auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.create') }}" style='color: white'>
                        Add book
                    </a>
                </li>
                @endif

            </ul>

            <!-- User Login -->
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    @if(auth()->check() && auth()->user()->is_admin)
                    <b class="my-auto">Admin</b>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="Admin Icon" width="35"
                                height="35" class="rounded-circle">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up border border-secondary shadow" aria-labelledby="drop2">
                            <div class="message-body">
                                @if(auth()->check())
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger w-100 mx-3 mt-2">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Login</a>
                                    <a href="{{ route('register') }}" class="btn btn-outline-warning mx-3 mt-2 d-block">Register</a>
                                @endif

                                @if (auth()->check() && auth()->user()->is_admin)
                                    <a href="/perpus/admin" class="btn btn-outline-primary mx-3 mt-2 d-block">Admin</a>
                                @endif
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
            <!-- End User Login -->

        </div>
    </div>
</nav>
