<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenresController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            $genres = Genre::paginate(3);
            return view('management.genres.index', [
                'genres' => $genres
            ]);
        }
        return redirect('/');
    }

    public function create()
    {
        if (auth()->user()->is_admin == 1) {
            return view('management.genres.create');
        }
        return redirect('/');
    }

    public function store(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|mimes:jpg,png,jpeg|max:5048'
            ]);
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            Genre::create([
                'name' => $request->name,
                'image_path' => $newImageName
            ]);
            return redirect('/genres');
        }
        return redirect('/');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (auth()->user()->is_admin == 1) {
            $genre = Genre::find($id);
            return view('management.genres.edit')->with('genre', $genre);
        }
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->is_admin == 1) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|mimes:jpg,png,jpeg|max:5048'
            ]);
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            Genre::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'image_path' => $newImageName
            ]);
            return redirect('/genres');
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        if (auth()->user()->is_admin == 1) {
            $genre = Genre::find($id);
            $genre->delete();
            return redirect('/genres');
        }
        return redirect('/');
    }
}
