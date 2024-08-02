@extends('layouts.app')
 
@section('title', 'Form Mã Giảm Giá')
 
@section('contents')
  <form action="{{ isset($cupon) ? route('cupon.update', $cupon->id) : route('cupon.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($cupon) ? 'Form Cập nhật  Mã giảm giá' : 'Form Thêm mục  Mã giảm giá' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Tên  Mã giảm giá</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($cupon) ? $cupon->ma_sale : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection