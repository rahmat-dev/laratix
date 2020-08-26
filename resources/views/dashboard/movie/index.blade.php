@extends('layouts.dashboard')

@section('content')
<div class="mb-2">
  <a href="{{ route('dashboard.movies.create') }}" class="btn btn-primary">
    <i class="fas fa-plus fa-xs"></i>
    <span> Movie</span>
  </a>
</div>

<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-8 align-self-center">
        <h3>Movies</h3>
      </div>
      <div class="col-md-4">
        <form action="{{ route('dashboard.movies') }}" method="GET">
          <div class="input-group">
            <input type="text" class="form-control form-control-sm" name="q" value="{{ Request::input('q') }}">
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-primary">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card-body p-0">
    @if ($movies->total() > 0)
    <table class="table table-striped table-hover table-borderless">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="col-thumbnail">Thumbnail</th>
          <th>Title</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($movies as $movie)
        <tr>
          <th scope="row" class="text-center align-middle">
            {{ ($movies->currentPage() - 1) * $movies->perPage() + $loop->iteration }}
          </th>
          <td class="col-thumbnail">
            <img src="{{ asset('storage/movies/' . $movie->thumbnail) }}" class="img-fluid">
          </td>
          <td>
            <h4>{{ $movie->title }}</h4>
          </td>
          <td>
            <a href="{{ route('dashboard.movies.edit', $movie->id) }}" class="btn btn-sm btn-success" title="Edit">
              <i class="fas fa-edit"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $movies->links() }}
    @else
    <h4 class="text-center p-3">Belum ada data Movie.</h4>
    @endif
  </div>
</div>
@endsection