<section id="header">
    <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" class="logo" alt=""></a>

    <div>
        <ul id="navbar">
            <li><a class="active" href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('shop')}}">Shop</a></li>
            <li><a href="{{route('blog')}}">Blog</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
            <li id="lg-bag"><a href="{{route('cart')}}"><i class="fas fa-shopping-bag"></i></a></li>
            <a href="{{route('cart')}}" id="close"><i class="fas fa-times"></i></a>
        </ul>
    </div>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <span class="dropdown-item">
                        {{ auth()->user()->name }}
                        |
                        <small>{{ auth()->user()->level }}</small>
                    </span>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="#!">Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#!">Activity Log</a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href={{route('logout')}}>Logout</a></li>
            </ul>
        </li>
    </ul>
</section>