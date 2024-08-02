@extends('flayouts.master')

@section('content')
<section id="page-header">
    <h2>Trang sản phẩm</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>

<!---- feature product section -------->
<section id="product1" class="section-p1">
    <div class="danhmuc">
        <div class="title">Danh mục sản phẩm</div>
        <ul>
            @foreach($dmsps as $dmsp)
            <li>
                <a href="{{route('sanphamtheodanhmuc', $dmsp->slug)}}">{{mb_strtoupper($dmsp->name)}}</a>
            </li>
            @endforeach
        </ul>
    </div>
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
                <input type="hidden" class="soluong" value="1">
                <a href="{{route('themVaoGiohang')}}" class="themvaogio" data-product-id="{{$sanpham->id}}"><i class="fa fa-shopping-cart cart"></i></a>
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- pagination  -->
<section id="pagination" class="section-p1">
    <!-- {{$sanphams->links()}} -->
</section>
<!---- newletter section start -->

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

@push('scripts')
<script>
    const all_themvaogios = document.querSelectorAll('.themvaogio');
    all_themvaogios.foreach(bt => {
        bt.addEventListener('click',(e)=>{
            e.preventDefault();
            e.stopPropagation();
            console.log(bt.data.productId)
        })
    })
</script>

@endpush