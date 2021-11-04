<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Genre;
use App\Models\Book;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Book::all();
        $count = count($products);
        $genres = Genre::all();
        return view('order.index', [
            'products' => $products,
            'genres' => $genres,
            'count' => $count
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $product = Book::find($id);
        return view('order.show', [
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request, $url)
    {
        if ($url == 'genre') {
            $genre = $request->genre;
            if ($genre == 'all') {
                $products = Book::all();
            } else {
                $products = DB::table('books')->where('genre', $genre)->get();
            }
        } elseif ($url == 'keyword') {
            $genre = '';
            $keyword = $request->keyword;
            $products = DB::table('books')
                ->where('name','LIKE','%'.$keyword.'%')
                ->orwhere('author','LIKE','%'.$keyword.'%')
                ->get();
        }
        $mark = $genre;
        $count = count($products);
        $genres = Genre::all();
        return view('order.index', [
            'products' => $products,
            'genres' => $genres,
            'count' => $count,
            'mark' => $mark
        ]);
    }
}
