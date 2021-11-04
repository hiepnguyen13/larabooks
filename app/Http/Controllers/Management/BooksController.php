<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;
use App\Models\Book;


class BooksController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            $books = Book::paginate(3);
            $count = count($books);
            $genres = Genre::all();
            return view('management.books.index', [
                'books' => $books,
                'genres' => $genres,
                'count' => $count
            ]);
        }
        return redirect('/');
    }

    public function create()
    {
        if (auth()->user()->is_admin == 1) {
            $genres = Genre::all();
            return view('management.books.create', [
                'genres' => $genres
            ]);
        }
        return redirect('/');
    }

    public function store(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|mimes:jpg,png,jpeg|max:5048',
                'author' => 'required|max:255',
                'rate' => 'required',
                'original_price' => 'required',
                'sale_price' => 'required',
                'format' => 'required|max:255',
                'publisher' => 'required|max:255',
                'published' => 'required',
                'genre' => 'required|max:255',
                'pages' => 'required',
                'quantity' => 'required',
                'description' => 'required'
            ]);
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            Book::create([
                'name' => $request->name,
                'image_path' => $newImageName,
                'author' => $request->author,
                'rate' => $request->rate,
                'original_price' => $request->original_price,
                'sale_price' => $request->sale_price,
                'format' => $request->format,
                'publisher' => $request->publisher,
                'published' => $request->published,
                'genre' => $request->genre,
                'pages' => $request->pages,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'editor_book' => $request->editor_book,
                'today_book' => $request->today_book,
                'trending_book' => $request->trending_book
            ]);
            return redirect('/books');
        }
        return redirect('/');  
    }

    public function show($genre)
    {
        if (auth()->user()->is_admin == 1) {
            if ($genre == 'all') {
                $books = Book::paginate(3);
            } else {
                $books = DB::table('books')->where('genre', $genre)->paginate(3);
            }
            $mark = $genre;
            $count = count($books);
            $genres = Genre::all();
            return view('management.books.index', [
                'books' => $books,
                'genres' => $genres,
                'count' => $count,
                'mark' => $mark
            ]);
        }
        return redirect('/');
    }

    public function edit($id)
    {
        if (auth()->user()->is_admin == 1) {
            $book = Book::find($id);
            $genres = Genre::all();
            return view('management.books.edit', [
                'book' => $book,
                'genres' => $genres
            ]);
        }
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->is_admin == 1) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|mimes:jpg,png,jpeg|max:5048',
                'author' => 'required|max:255',
                'rate' => 'required',
                'original_price' => 'required',
                'sale_price' => 'required',
                'format' => 'required|max:255',
                'publisher' => 'required|max:255',
                'published' => 'required',
                'genre' => 'required|max:255',
                'pages' => 'required',
                'quantity' => 'required',
                'description' => 'required'
            ]);
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            Book::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'image_path' => $newImageName,
                    'author' => $request->author,
                    'rate' => $request->rate,
                    'original_price' => $request->original_price,
                    'sale_price' => $request->sale_price,
                    'format' => $request->format,
                    'publisher' => $request->publisher,
                    'published' => $request->published,
                    'genre' => $request->genre,
                    'pages' => $request->pages,
                    'quantity' => $request->quantity,
                    'description' => $request->description,
                    'editor_book' => $request->editor_book,
                    'today_book' => $request->today_book,
                    'trending_book' => $request->trending_book
            ]);
            return redirect('/books');
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        if (auth()->user()->is_admin == 1) {
            $book = Book::find($id);
            $book->delete();
            return redirect('/books');
        }
        return redirect('/');
    }
}
