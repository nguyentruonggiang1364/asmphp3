@extends('flayouts.master')

@section('content')
<section id="page-header">
    <h2>Trang sản phẩm</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>

<section id="product1" class="section-p1">
    <div class="container">
        <form action="{{route('themVaoGiohang')}}">
            <div class="chitiet">
                <h1>{{$sanpham->name}}</h1>
                <img src="{{ asset($sanpham->hinhanhs[0]->tenanh) }}" alt="" width="500px" height="300px" />
                <div class="single-product-details">
                    <h4>{{$sanpham->name}}</h4>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h2>{{$sanpham->price}}</h2>
                    <select name="" id="">
                        <option value="">Select Size</option>
                        <option value="">XXL</option>
                        <option value="">XL</option>
                        <option value="">Medium</option>
                        <option value="">Small</option>
                    </select>
                    <input type="number" value="1" name="quantity" />
                    <button>Thêm vào giỏ hàng</button>
                    <h4>Thông tin sản phẩm</h4>
                    <span>
                        {{$sanpham->description}}
                    </span>
                </div>
                <input type="hidden" name="productId" value="{{$sanpham->id}}">
                <button type="submit"><i class="fa fa-shopping-cart cart"></i></button>
            </div>
        </form>

    </div>
</section>
@endsection