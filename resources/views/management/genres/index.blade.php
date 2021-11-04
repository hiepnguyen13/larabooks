@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10">
        <div class="w-5/12 bg-white p-6 rounded-lg">
            <h3 class="text-3xl font-bold text-gray-800">Genre management</h3>
            <div class="pt-4 mb-16">
                <a href="genres/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">Add a new genre &rarr;</a>
            </div>

            @foreach ($genres as $genre)
                <div class="flex justify-between">
                    <div class="w-1/3">
                        <img src="{{ asset('images/' . $genre->image_path) }}" alt="" class="shadow-lg">
                    </div>
                    <div class="w-2/3 flex pl-10 justify-between">
                        <h4 class="text-gray-700 text-xl font-semibold uppercase self-center">{{ $genre->name }}</h4>
                        <div class="self-center">
                            <a href="genres/{{ $genre->id }}/edit" class="border-b-2 pb-1 border-dotted italic text-green-500">Edit &rarr;</a>
                            <form action="/genres/{{ $genre->id }}" method="POST" class="pt-5">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-b-2 pb-1 border-dotted italic text-red-500">Delete &rarr;</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="my-5">
            @endforeach
            {{ $genres->links() }}
        </div>
    </div>
@endsection