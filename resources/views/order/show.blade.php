@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10">
        <div class="w-3/5 bg-white p-6 rounded-lg">
            <a href="/products" class="border-b-2 pb-1 border-dotted italic text-green-500">&larr; Back</a>
            <div class="flex m-10">
                <input type="text" name="id" value="{{ $product->id }}" hidden>
                <div class="w-1/4">
                    <img src="{{ asset('images/' . $product->image_path) }}" alt="" class="shadow-lg">
                </div>

                <div class="w-3/4 pl-10">
                    <h3 class="text-4xl font-semibold text-gray-800 capitalize">{{ $product->name }}</h3>
                    <div class="flex">
                        <div class="mr-32">
                            <p class="text-lg font-normal text-gray-600 capitalize italic pt-1">{{ $product->author }}</p>
                            <p class="text-lg font-normal text-yellow-300 capitalize italic pt-1">
                                @for ($i = 0; $i < $product->rate; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </p>
                            <div class="flex pt-5">
                                <p class="text-5xl font-semibold text-red-500 self-end mr-3">${{ $product->sale_price }}</p>
                                <p class="text-xl font-normal text-gray-500 line-through self-end">${{ $product->original_price }}</p>
                            </div>

                            @if ($product->quantity >= 3)
                                <a href="/checkout/{{ $product->id }}" class="bg-gray-700 hover:bg-gray-600 text-white text-lg mt-10 px-10 py-3 rounded font-medium inline-block">Order</a>
                            @else
                                <p class="bg-gray-400 text-white text-md mt-10 px-10 py-3 font-medium inline-block">Out of stock</p>
                            @endif
                            
                        </div>
                        
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 capitalize">Description</h3>
                            <p class="text-md font-normal text-gray-600 capitalize italic pt-1 pl-3">Format: {{ $product->format }}</p>
                            <p class="text-md font-normal text-gray-600 capitalize italic pt-1 pl-3">Publisher: {{ $product->publisher }}</p>
                            <p class="text-md font-normal text-gray-600 capitalize italic pt-1 pl-3">Published: {{ $product->published }}</p>
                            <p class="text-md font-normal text-gray-600 capitalize italic pt-1 pl-3">Genre: {{ $product->genre }}</p>
                            <p class="text-md font-normal text-gray-600 capitalize italic pt-1 pl-3">Pages: {{ $product->pages }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-10 pt-5">
                <h3 class="text-3xl font-semibold text-gray-800 capitalize">Plot Overview</h3>
                <div class="mt-5 text-md font-normal text-gray-700 des">@php echo($product->description); @endphp</div>
            </div>
        </div>
    </div> 
@endsection