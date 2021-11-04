<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;

class HomeController extends Controller
{
    public function index() {
        $genres = Genre::all();
        $editorBooks = Book::where('editor_book', 1)->inRandomOrder()->limit(6)->get();
        $todayBooks = Book::where('today_book', 1)->inRandomOrder()->limit(6)->get();
        $trendingBooks = Book::where('trending_book', 1)->inRandomOrder()->limit(12)->get();
        return view('home', [
            'genres' => $genres,
            'editorBooks' => $editorBooks,
            'todayBooks' => $todayBooks,
            'trendingBooks' => $trendingBooks
        ]);
    }
}
