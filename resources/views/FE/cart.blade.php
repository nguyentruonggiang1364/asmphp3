@extends('flayouts.master')

@section('content')
<section id="page-header" class="about-header">
    <h2>Giỏ hàng</h2>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <th>Xóa</th>
                <th>Ảnh</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @if(session()->has('cart'))
                @foreach(session('cart') as $sanpham)
                    <tr>
                        <td><i class="fa fa-times-circle delete-item"></i></td>
                        <td><img src="{{asset($sanpham['anh'])}}" alt="" /></td>
                        <td>{{$sanpham['name']}}</td>
                        <td>{{$sanpham['gia']}} VNĐ</td>
                        <td><input type="number" value="{{$sanpham['soluong']}}" /></td>
                        <td>{{$sanpham['gia'] * $sanpham['soluong']}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</section>


<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Mã giảm giá</h3>
        <div>
            <input type="text" placeholder="Nhập mã giảm giá" />
            <button class="normal">Áp dụng</button>
        </div> <br> <br>
        <form action="{{route('thanhcong')}}" method="POST">
            @csrf
            <div class="info">
                <h3>Thông Tin</h3>
                <input type="text" placeholder="Nhập Tên Người Dùng" name="user_id" />
                <input type="text" placeholder="Nhập Tỉnh" name="tinh_id" />
                <input type="text" placeholder="Nhập Huyện" name="huyen_id" />
                <input type="text" placeholder="Nhập Xã" name="xa_id" />
                <input type="text" placeholder="Nhập Địa Chỉ" name="diachi_id" />
                <input type="text" placeholder="Nhập Ghi Chú" name="ghichu" />
                <input type="hidden" name="trangthai" />
            </div>
    </div>

    <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Tổng tiền:</td>
                <td>{{ $tongtien }} VNĐ</td>
            </tr>
            <tr>
                <td>Vận chuyển:</td>
                <td>Miễn phí</td>
            </tr>
            <tr>
                <td><strong>Tiền thanh toán:</strong></td>
                <td><strong>{{ $tongtien }} VNĐ</strong></td>
            </tr>
            <input type="hidden" name="tongtien" value="{{$tongtien}}">
        </table>
        <button type="submit" class="normal"> Tiến hành thanh toán </button>
    </div>
    </form>
</section>
<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>
            Get Email updates about our latest shop and
            <span>special offers.</span>
        </p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your email address" />
        <button class="normal">Sign Up</button>
    </div>
</section>
@endsection