@extends('layouts.dashboard')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-8 align-self-center">
        <h3>Users</h3>
      </div>
      <div class="col-md-4 text-right">
        <button class="btn btn-sm text-secondary" data-toggle="modal" data-target="#deleteModal">Delete</button>
      </div>
    </div>
  </div>
  <div class="card-body p-0 py-4">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <form action="{{ url('/dashboard/user/update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}">

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email }}">

            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Cancel</button>
            <button class="btn btn-sm btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Hapus Data</h3>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menghapus data user <b>{{ $user->name }}</b>?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>

        <form action="{{ url('/dashboard/user/delete', $user->id) }}" method="POST">
          @csrf
          @method('DELETE')

          <button class="btn btn-sm btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection