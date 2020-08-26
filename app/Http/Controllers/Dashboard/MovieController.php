<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
  public $active = 'Movies';

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, Movie $movie)
  {
    $querySearch = $request->input('q');

    $movies = $movie->when($querySearch, function ($query) use ($querySearch) {
      return $query->where('name', 'like', '%' . $querySearch . '%')
        ->orWhere('email', 'like', '%' . $querySearch . '%');
    })->paginate(10);

    $movies->appends($request->only('q'));

    return view('dashboard.movie.index', [
      'movies' => $movies,
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
    return view('dashboard.movie.create', [
      'active' => $this->active
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Movie $movie)
  {
    $validateMovie = $request->validate([
      'title' => 'required|unique:movies,title',
      'description' => 'required',
      'thumbnail' => 'required|image'
    ]);

    $image = $request->file('thumbnail');
    $filename = time() . '.' . $image->getClientOriginalExtension();

    Storage::disk('local')->putFileAs('public/movies', $image, $filename);

    $movie->title = $validateMovie['title'];
    $movie->description = $validateMovie['description'];
    $movie->thumbnail = $filename;
    $movie->save();

    return redirect()->route('dashboard.movies');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function show(Movie $movie)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function edit(Movie $movie)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Movie $movie)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function destroy(Movie $movie)
  {
    //
  }
}
