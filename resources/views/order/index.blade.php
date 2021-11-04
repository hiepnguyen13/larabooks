@extends('layouts.app')

@section('content')
    <div class="flex justify-center justify-evenly items-start my-10">
        <div class="w-3/12 ">
            
            <div class="bg-white p-6 rounded-lg mb-10">
                <form action="/products/keyword" method="POST">
                    @csrf
                    <div class="flex justify-between">
                        <label for="search" class="sr-only">Search</label>
                        <input type="search" name="keyword" id="search" placeholder="book, author" class="bg-gray-100 border-2 w-10/12 p-4 rounded-lg @error('email') border-red-500 @enderror" value="">
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                        <button type="submit" class="bg-gray-700 hover:bg-gray-600 hover:border-gray-600 border-2 border-gray-700 text-white p-4 rounded-lg">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg">
                <h4 class="text-2xl font-semibold text-gray-600 pb-3">Genre</h4>

                @foreach ($genres as $genre)
                    <div class="mt-2">
                        <form action="/products/genre" method="POST">
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
                    <form action="/products/genre" method="POST">
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
            <h3 class="text-3xl font-bold text-gray-800 mb-3">Our Books</h3>
            @if ($count > 0)
                <div class="grid grid-cols-5 gap-6">
                    @foreach ($products as $product)
                            <div class="mt-5 justify-self-center">
                                <a href="/products/{{ $product->id }}" class="">
                                    <img src="{{ asset('images/' . $product->image_path) }}" alt="" class="hover:shadow-lg">
                                    <p class="capitalize text-md font-semibold text-gray-600 mt-2">{{ $product->name }}</p>
                                    <p class="capitalize italic text-sm font-normal text-gray-500">{{ $product->author }}</p>
                                    <p class="text-xs text-yellow-300 pt-1">
                                        @for ($i = 0; $i < $product->rate; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </p>
                                    <div class="flex mt-1">
                                        <p class="text-2xl font-semibold text-red-500 self-end mr-2">${{ $product->sale_price }}</p>
                                        <p class="text-md font-normal text-gray-400 self-end line-through">${{ $product->original_price }}</p>
                                    </div>
                                </a>
                            </div>
                    @endforeach
                </div>
                <div class="">
                    <hr class="my-5">
                </div>
            @else
                <p class="text-lg text-gray-400 italic pl-10">Nothing here!</p>
            @endif
        </div>
    </div>
@endsection