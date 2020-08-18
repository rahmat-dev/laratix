@extends('layouts.dashboard')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-8 align-self-center">
        <h3>Users</h3>
      </div>
      <div class="col-md-4">
        <form action="{{ route('dashboard.users') }}" method="GET">
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
    <table class="table table-striped table-hover table-borderless">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Registered</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row" class="text-center">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
          </th>
          <td>{{ $user['name'] }}</td>
          <td>{{ $user['email'] }}</td>
          <td>{{ $user['created_at'] }}</td>
          <td>
            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-success" title="Edit">
              <i class="fas fa-edit"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $users->links() }}
  </div>
</div>
@endsection