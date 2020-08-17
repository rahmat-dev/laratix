@extends('layouts.dashboard')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Users</h3>
  </div>
  <div class="card-body p-0">
    <table class="table">
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
          <td>1</td>
          <td>{{$user['name']}}</td>
          <td>{{$user['email']}}</td>
          <td>{{$user['created_at']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection