@extends('layouts.app')

@section('content')
    <div class="flex justify-center justify-evenly items-start my-10">
        <div class="w-3/12 ">
            
            <div class="bg-white p-6 rounded-lg">
                <h4 class="text-2xl font-semibold text-gray-600 pb-3">Genre</h4>

                @foreach ($genres as $genre)
                    <div class="mt-2">
                        <form action="/books/{{ $genre->name }}" method="POST">
                            @csrf
                            <label for="{{ $genre->name }}" class="sr-only">Genre</label>
                            <input type="text" name="genre" id="{{ $genre->name }}" value="{{ $genre->name }}" hidden>
                            @if (isset($genre, $mark) && $genre->name == $mark)
                                <button type="submit" class="border border-gray-700 bg-gray-700 text-white px-4 py-3 rounded font-medium w-full capitalize">{{ $genre->name }}</button>
                            @else
                                <button type="submit" class="border border-gray-400 bg-white text-gray-900 px-4 py-3 rounded font-medium w-full capitalize hover:bg-gray-700 hover:text-white hover:border-gray-700">{{ $genre->name }}</button>
                            @endif

                        </form>
                    </div>
                @endforeach
                <hr class="my-5">
                <div class="mt-2">
                    <form action="/books/all" method="POST">
                        @csrf
                        <label for="all" class="sr-only">All</label>
                        <input type="text" name="genre" id="all" value="all" hidden>
                        @if (isset($genre, $mark) && $mark != 'all')
                            <button type="submit" class="border border-gray-400 bg-white text-gray-900 px-4 py-3 rounded font-medium w-full capitalize hover:bg-gray-700 hover:text-white hover:border-gray-700">show all</button>
                        @else
                            <button type="submit" class="border border-gray-700 bg-gray-700 text-white px-4 py-3 rounded font-medium w-full capitalize">show all</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>


        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h3 class="text-3xl font-bold text-gray-800">Book management</h3>
            <div class="pt-4 mb-10">
                <a href="/books/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">Add a new book &rarr;</a>
            </div>


            @if ($count > 0)
                @foreach ($books as $book)
                    <div class="flex justify-between ml-8">
                        <div class="w-1/6">
                            <img src="{{ asset('images/' . $book->image_path) }}" alt="" class="shadow-lg">
                        </div>
                        <div class="w-4/6 flex pl-10 justify-between">
                            <div class="w-full">
                                <h4 class="text-gray-700 text-xl font-semibold capitalize">{{ $book->name }}</h4>
                                <div class="flex w-full">
                                    <div class="p-3 w-2/5">
                                        <p class="text-gray-600 p-1 capitalize">Author: {{ $book->author }}</p>
                                        <p class="text-gray-600 p-1">Rate: 
                                            <span class="text-sm text-yellow-300">
                                                @for ($i = 0; $i < $book->rate; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </span>
                                        </p>
                                        <p class="text-gray-600 p-1">Original price: ${{ $book->original_price }}</p>
                                        <p class="text-gray-600 p-1">Sale price: ${{ $book->sale_price }}</p>
                                        <p class="text-gray-600 p-1">In stock: {{ $book->quantity }}</p>
                                    </div>
                                    <div class="p-3 w-2/5">
                                        <p class="text-gray-600 p-1 capitalize">Format: {{ $book->format }}</p>
                                        <p class="text-gray-600 p-1 capitalize">Publisher: {{ $book->publisher }}</p>
                                        <p class="text-gray-600 p-1">Published: {{ date("d-m-Y", strtotime($book->published)) }}</p>
                                        <p class="text-gray-600 p-1 capitalize">Genre: {{ $book->genre }}</p>
                                        <p class="text-gray-600 p-1">Pages: {{ $book->pages }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="self-center w-1/6">
                            <a href="/books/{{ $book->id }}/edit" class="border-b-2 pb-1 border-dotted italic text-green-500">Edit &rarr;</a>
                            <form action="/books/{{ $book->id }}" method="POST" class="pt-5">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-b-2 pb-1 border-dotted italic text-red-500">Delete &rarr;</button>
                            </form>
                        </div>
                    </div>
                    <hr class="my-5">
                @endforeach
                {{ $books->links() }}
            @else
                <p class="text-lg text-gray-400 italic pl-10">Nothing here!</p>
            @endif

        </div>
    </div>
@endsection