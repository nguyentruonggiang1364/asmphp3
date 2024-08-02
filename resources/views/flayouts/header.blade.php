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
</section>