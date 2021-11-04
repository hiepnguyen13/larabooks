@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="/genres/{{ $genre->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" value="{{ $genre->name }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="sr-only">Image</label>
                    <input type="file" name="image" id="image" class="w-full">
                    @error('image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div>
                    <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-3 rounded font-medium w-full">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection