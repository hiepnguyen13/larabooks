@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10">
        <div class="w-1/2 bg-white p-6 rounded-lg">
            <form action="/checkout" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $product->id }}" hidden>
                <div class="flex justify-evenly m-10">
                    <div class="w-1/2 text-center">
                        <img src="{{ asset('images/' . $product->image_path) }}" alt="" class="shadow-lg inline-block w-3/4">
                    </div>

                    <div class="pl-10 w-1/2">
                        <div class="">
                            <h3 class="text-3xl font-semibold text-gray-800 capitalize mb-1">{{ $product->name }}</h3>
                            <p class="text-lg font-normal text-gray-600 capitalize italic mb-1">{{ $product->author }}</p>
                            <p class="text-2xl font-semibold text-gray-800 self-end mb-4">Price: <span class="text-red-500">${{ $product->sale_price }}</span></p>
                        </div>

                        <div class="flex-col mt-9">
                            <div class="mb-4">
                                <label for="quantity" class="sr-only">Quantity</label>
                                <input type="number" name="quantity" id="quantity" placeholder="Quantity: Form 1 to 3" min="1" max="3" step="1" class="bg-gray-100 border-2 w-60 p-4 rounded-lg @error('quantity') border-red-500 @enderror">
                                @error('quantity')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="mb-4">
                                <label for="day" class="sr-only">Day</label>
                                <input type="number" name="day" id="day" placeholder="Day: From 1 to 30" min="1" max="30" step="1" class="bg-gray-100 border-2 w-60 p-4 rounded-lg @error('day') border-red-500 @enderror">
                                @error('day')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white text-xl px-5 py-3 rounded font-medium w-60">Order</button>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>    
@endsection