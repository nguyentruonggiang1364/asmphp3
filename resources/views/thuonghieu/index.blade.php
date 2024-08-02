@extends('layouts.app')
 
@section('title', 'Data Thương Hiệu')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Thương Hiệu</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('thuonghieu.add') }}" class="btn btn-primary mb-3">Add Thương Hiệu</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên Thương Hiệu</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($all as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->name }}</td>
                <td>
                  <a href="{{ route('thuonghieu.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('thuonghieu.delete', $row->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection