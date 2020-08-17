@extends('layouts.dashboard')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-8">
        <h3>Users</h3>
      </div>
      <div class="col-md-4">
        <form action="{{ url('/dashboard/users') }}" method="GET">
          <div class="input-group">
            <input type="text" class="form-control" name="q" value="{{ Request::input('q') }}">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped table-hover table-borderless">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Registered</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
          <td>{{ $user['name'] }}</td>
          <td>{{ $user['email'] }}</td>
          <td>{{ $user['created_at'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $users->links() }}
  </div>
</div>
@endsection