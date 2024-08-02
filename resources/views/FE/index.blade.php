@extends('flayouts.master')

@section('content')
<!---- home page section -------->
<section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button>Shop Now</button>
</section>

<!---- feature section -------->
<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="{{asset('img/features/f1.png')}}" alt="">
        <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('img/features/f2.png')}}" alt="">
        <h6>Online Order</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('img/features/f3.png')}}" alt="">
        <h6>Save Money</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('img/features/f4.png')}}" alt="">
        <h6>Promotions</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('img/features/f5.png')}}" alt="">
        <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('img/features/f6.png')}}" alt="">
        <h6>F24/7 Supper</h6>
    </div>

</section>

<!---- feature product section -------->
<section id="product1" class="section-p1">
    <div class="pro-container">
        @foreach($sanphams as $sanpham)
        <div class="pro">
            <a href="{{route('chitietsanpham',$sanpham->slug)}}">
                <img src="{{ asset($sanpham->hinhanhs[0]->tenanh) }}" alt="" />
                <div class="des">
                    <span>{{ $sanpham->danhmuc_id }}</span>
                    <h5>{{$sanpham->name}}</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>{{$sanpham->price}} VNĐ</h4>
                </div>
                <a href="#"><i class="fa fa-shopping-cart cart"></i></a>
            </a>
        </div>
        @endforeach
    </div>
</section>

<!---- arrivals section start  -->
<section id="banner" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Up to <span> 70% off</span> - All t-Shirts & Accessories</h2>
    <button class="normal">Explore More</button>
</section>

<!---- feature product section -------->
<section id="product1" class="section-p1">
    
    <div class="pro-container">
        @foreach($sanphams as $sanpham)
        <div class="pro">
            <a href="{{route('chitietsanpham',$sanpham->slug)}}">
                <img src="{{ asset($sanpham->hinhanhs[0]->tenanh) }}" alt="" />
                <div class="des">
                    <span>{{ $sanpham->danhmuc_id }}</span>
                    <h5>{{$sanpham->name}}</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>{{$sanpham->price}} VNĐ</h4>
                </div>
                <a href="#"><i class="fa fa-shopping-cart cart"></i></a>
            </a>
        </div>
        @endforeach
    </div>
</section>

<!---- sm banner section start  -->

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>crazy deals</h4>
        <h2>buy 1 get 1 free</h2>
        <span>The best claassis dress is on sale at cara</span>
        <button class="white">Leran More</button>
    </div>
    <div class="banner-box banner-box2">
        <h4>spring/summer</h4>
        <h2>upcomming season</h2>
        <span>The best claassis dress is on sale at cara</span>
        <button class="white">Leran More</button>
    </div>

</section>

<section id="banner3">
    <div class="banner-box">
        <h2>SEASONAL SALE</h2>
        <h3>Winter Collection - 50% OFF</h3>
    </div>
    <div class="banner-box banner-box2">
        <h2>SEASONAL SALE</h2>
        <h3>Winter Collection - 50% OFF</h3>
    </div>
    <div class="banner-box banner-box3">
        <h2>SEASONAL SALE</h2>
        <h3>Winter Collection - 50% OFF</h3>
    </div>
</section>

<!---- newletter section start -->

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>Get Email updates about our latest shop and <span>special offers.</span></p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your email address">
        <button class="normal">Sign Up</button>
    </div>
</section>
@endsection