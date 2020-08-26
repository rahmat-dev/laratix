@extends('layouts.dashboard')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-8 align-self-center">
        <h3>Movies</h3>
      </div>
    </div>
  </div>
  <div class="card-body p-0 py-4">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <form action="{{ route('dashboard.movies.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">

            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>

            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <div class="custom-file">
              <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
              <label for="thumbnail" class="custom-file-label">Choose file...</label>
            </div>

            @error('thumbnail')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Cancel</button>
            <button class="btn btn-sm btn-success">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection