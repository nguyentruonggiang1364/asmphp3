@extends('layouts.app')
 
@section('title', 'Form User')
 
@section('contents')
<form action="{{ isset($user) ? route('users.update', $user->id) : route('users.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Form Edit user' : 'Form plus user' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="item_code">Name</label>
              <input type="text" class="form-control" id="item_code" name="item_code" value="{{ isset($user) ? $user->name : '' }}">
            </div>
            <div class="form-group">
              <label for="username">Email</label>
              <input type="text" class="form-control" id="username" name="username" value="{{ isset($user) ? $user->email : '' }}">
            </div>
            <div class="form-group">
              <label for="username">level</label>
              <input type="text" class="form-control" id="username" name="username" value="{{ isset($user) ? $user->level : '' }}">
            </div>
            <div class="form-group">
              <label for="price">pass</label>
              <input type="number" class="form-control" id="price" name="price" value="{{ isset($user) ? $user->password : '' }}">
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