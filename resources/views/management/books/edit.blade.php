@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex justify-between">

                    {{-- Left column --}}
                    <div class="w-5/12">

                        {{-- Name --}}
                        <div class="mb-4">
                            <label for="name" class="">Name</label>
                            <input type="text" name="name" id="name" value="{{ $book->name }}" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg capitalize @error('name') border-red-500 @enderror">
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Author --}}
                        <div class="mb-4">
                            <label for="author" class="">Author</label>
                            <input type="text" name="author" id="author" value="{{ $book->author }}" placeholder="Author" class="bg-gray-100 border-2 w-full p-4 rounded-lg capitalize @error('author') border-red-500 @enderror">
                            @error('author')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Genre --}}
                        <div class="mb-4">
                            <label for="genre" class="">Genre</label>

                            <select name="genre" id="genrer" class="bg-gray-100 border-2 w-full p-4 rounded-lg capitalize @error('genre') border-red-500 @enderror">
                                <option value="{{ $book->genre }}" selected>{{ $book->genre }}</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                            @error('genre')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Rate --}}
                        <div class="mb-4">
                            <label for="rate" class="">Rate</label>
                            <input type="number" name="rate" id="rate" value="{{ $book->rate }}" placeholder="Rate" min="1" max="5" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('rate') border-red-500 @enderror">
                            @error('rate')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        {{-- Original price --}}
                        <div class="mb-4">
                            <label for="original_price" class="">Original price</label>
                            <input type="number" name="original_price" id="original_price" value="{{ $book->original_price }}" placeholder="Original price" step="any" min="0" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('original_price') border-red-500 @enderror">
                            @error('original_price')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Sale price --}}
                        <div class="mb-4">
                            <label for="sale_price" class="">Sale price</label>
                            <input type="number" name="sale_price" id="sale_price" value="{{ $book->sale_price }}" placeholder="Sale price" step="any" min="0" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('sale_price') border-red-500 @enderror">
                            @error('sale_price')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Format --}}
                        <div class="mb-4">
                            <label for="format" class="">Format</label>
                            <input type="text" name="format" id="format" value="{{ $book->format }}" placeholder="Format" class="bg-gray-100 border-2 w-full p-4 rounded-lg capitalize @error('format') border-red-500 @enderror">
                            @error('format')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    {{-- Right column --}}
                    <div class="w-5/12">
                        
                        {{-- Publisher --}}
                        <div class="mb-4">
                            <label for="publisher" class="">Publisher</label>
                            <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}" placeholder="Publisher" class="bg-gray-100 border-2 w-full p-4 rounded-lg capitalize @error('publisher') border-red-500 @enderror">
                            @error('publisher')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- Published --}}
                        <div class="mb-4">
                            <label for="published" class="">Published</label>
                            <input type="date" name="published" id="published" value="{{ $book->published }}" placeholder="Published" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('published') border-red-500 @enderror">
                            @error('published')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                                                
                        {{-- Pages --}}
                        <div class="mb-4">
                            <label for="pages" class="">Pages</label>
                            <input type="number" name="pages" id="pages" value="{{ $book->pages }}" placeholder="Pages" min="1" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('pages') border-red-500 @enderror">
                            @error('pages')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Quantity --}}
                        <div class="mb-4">
                            <label for="quantity" class="">In stock</label>
                            <input type="number" name="quantity" id="quantity" value="{{ $book->quantity }}" placeholder="Quantity" min="1" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('quantity') border-red-500 @enderror">
                            @error('quantity')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-4">
                            <label for="image" class="">Image</label>
                            <input type="file" name="image" id="image" class="w-full">
                            @error('image')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <p class="mb-2">Optional</p>
                            {{-- Editor --}}
                            <div class="mb-2 ml-4">
                                <input type="checkbox" name="editor_book" id="editor_book" value="1" class="">
                                <label for="editor_book" class="">Editor</label>
                            </div>
    
                            {{-- Today --}}
                            <div class="mb-2 ml-4">
                                <input type="checkbox" name="today_book" id="today_book" value="1" class="">
                                <label for="today_book" class="">Today</label>
                            </div>
    
                            {{-- Trending --}}
                            <div class="mb-2 ml-4">
                                <input type="checkbox" name="trending_book" id="trending_book" value="1" class="">
                                <label for="trending_book" class="">Trending</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Desctiption --}}
                <div class="mb-4">
                    <label for="description" class="">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" placeholder="Description">{{ $book->description }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Button --}}
                <div>
                    <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-3 rounded font-medium w-full">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection