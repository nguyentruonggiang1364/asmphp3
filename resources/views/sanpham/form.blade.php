@extends('layouts.app')

@section('title', 'Form Sản Phẩm')

@section('contents')
<form action="{{isset($sanpham) ? route('sanpham.update', $sanpham->id) : route('sanpham.save') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ isset($sanpham) ? 'Form Cập nhật Sản phẩm' : 'Form Thêm mói Sản phẩm' }}</h6>
        </div>
        <div class="card-body">

          <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($sanpham) ? $sanpham->name : '' }}">
          </div>

          <div class="form-group">
            <label for="">Hình ảnh sản phẩm</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>

            @if(isset($sanpham))
            @foreach($anhs as $anh)
            <img src="{{asset($anh->tenanh)}}" alt="" width="100px" height="100px">
            @endforeach
            @endif

          </div>

          <div class="form-group">
            <label for="">Giá</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ isset($sanpham) ? $sanpham->price : '' }}">
          </div>

          <div class="form-group">
            <label for="">Danh mục SP</label>
            <select name="danhmuc_id" id="danhmuc_id" class="custom-select form-control">
              <option value="" selected disabled hidden>-- Choose Danh mục --</option>
              @foreach ($danhmuc as $row)
              <option value="{{ $row->id }}" {{ isset($sanpham) ? ($sanpham->danhmuc_id == $row->id ? 'selected' : '') : '' }}>{{ $row->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Thương hiệu SP</label>
            <select name="thuonghieu_id" id="thuonghieu_id" class="custom-select form-control">
              <option value="" selected disabled hidden>-- Choose Thương hiệu --</option>
              @foreach ($thuonghieu as $row)
              <option value="{{ $row->id }}" {{ isset($sanpham) ? ($sanpham->thuonghieu_id == $row->id ? 'selected' : '') : '' }}>{{ $row->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Mô tả</label>
            <input type="textarea" class="form-control" id="description" name="description" value="{{ isset($sanpham) ? $sanpham->description : '' }}">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection