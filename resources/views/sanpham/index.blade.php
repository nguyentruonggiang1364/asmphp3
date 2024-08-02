@extends('layouts.app')

@section('title', 'Data Sản Phẩm')

@section('contents')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Sản Phẩm</h6>
  </div>
  <div class="card-body">
    @if (auth()->user()->level == 'Admin')
    <a href="{{ route('sanpham.add') }}" class="btn btn-primary mb-3">Add Sản Phẩm</a>
    @endif
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Thương Hiệu</th>
            <th>Danh Mục</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $(function() {
    var table = $('#dataTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{route('sanpham')}}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'sname',
          name: 'sname'
        },
        {
          data: 'tname',
          name: 'tname'
        },
        {
          data: 'dname',
          name: 'dname'
        },
        {
          data: 'description',
          name: 'description'
        },
        {
          data: 'price',
          name: 'price'
        },
        {
          data: 'action',
          name: 'action'
        },
      ]
    });
  })
</script>
@endsection