<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public $active = 'Users';

  // public function __construct()
  // {
  //   $this->middleware('auth');
  // }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, User $user)
  {
    $querySearch = $request->input('q');
    $active = 'Users';
    $users = $user->when($querySearch, function ($query) use ($querySearch) {
      return $query->where('name', 'like', '%' . $querySearch . '%')
        ->orWhere('email', 'like', '%' . $querySearch . '%');
    })->paginate(10);

    $users->appends($request->only('q'));

    return view('dashboard.user.index', [
      'users' => $users,
      'active' => $this->active
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    return view('dashboard.user.edit', [
      'user' => User::find($id),
      'active' => $this->active
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validateUser = $request->validate([
      'name' => 'required',
      'email' => 'required|unique:users,email,' . $id
    ]);

    $user = User::find($id);
    $user->update($validateUser);

    return redirect('/dashboard/users');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    User::findOrFail($id)->delete();

    return redirect('/dashboard/users');
  }
}
