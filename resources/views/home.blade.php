@extends('layouts.app')

@section('content')

    <div class="slideshow-container">
        <div class="mySlides fade relative">
            <img src="{{ asset('images/root/slide-1.jpg') }}" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="{{ asset('images/root/slide-2.jpg') }}" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="{{ asset('images/root/slide-3.jpg') }}" style="width:100%">
        </div>
    </div>

    <div class="flex justify-center my-10">
        <div class="w-4/5 bg-white p-20 rounded-lg">
            
            {{-- BROWSE GENRES --}}
            <div class="mb-24">
                <h3 class="text-3xl font-bold text-gray-800 uppercase pb-10">browse genres</h3>
                <div class="grid grid-flow-row grid-cols-4 grid-rows-{{ intdiv(count($genres),4) + (count($genres) % 4 > 0 ? 1 : 0) }} gap-4">
                    @foreach ($genres as $genre)
                        <div class="justify-self-center">
                            <form action="/products/genre" method="POST">
                                @csrf
                                <label for="{{ $genre->name }}" class="sr-only">Genre</label>
                                <input type="text" name="genre" id="{{ $genre->name }}" value="{{ $genre->name }}" hidden>
                                <button type="submit" >
                                    <div class="relative text-center hover:shadow-lg">
                                        <a href="">
                                            <img src="{{ asset('images/' . $genre->image_path) }}" alt="" class="">
                                            <p class="bg-gray-800 bg-opacity-50 text-white text-lg capitalize tracking-wider py-2 absolute bottom-0 left-0 block w-full">{{ $genre->name }}</p>
                                        </a>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>


            {{-- EDITOR'S CHOICE --}}
            <div class="mb-24">
                <h3 class="text-3xl font-bold text-gray-800 uppercase pb-10">editor's choice</h3>
                <div class="grid grid-flow-row grid-cols-6 grid-rows-1 gap-4">
                    @foreach ($editorBooks as $editorBook)
                        <div class="text-left justify-self-center">
                            <a href="/products/{{ $editorBook->id }}">
                                <img src="{{ asset('images/' . $editorBook->image_path) }}" alt="" class="hover:shadow-lg">
                                <p class="text-gray-600 text-md capitalize pt-2">{{ $editorBook->name }}</p>
                                <p class="text-xs text-yellow-300 pt-1">
                                    @for ($i = 0; $i < $editorBook->rate; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


            {{-- TODAY'S FREE EBOOKS AND DEALS --}}
            <div class="mb-24">
                <h3 class="text-3xl font-bold text-gray-800 uppercase pb-10">today's free books and deals</h3>
                <div class="grid grid-flow-row grid-cols-6 grid-rows-1 gap-4">
                    @foreach ($todayBooks as $todayBook)

                        <div class="text-left justify-self-center">
                            <a href="/products/{{ $todayBook->id }}">
                                <img src="{{ asset('images/' . $todayBook->image_path) }}" alt="" class="hover:shadow-lg">
                                <p class="text-gray-600 text-md capitalize pt-2">{{ $todayBook->name }}</p>
                                <p class="text-xs text-yellow-300 pt-1">
                                    @for ($i = 0; $i < $todayBook->rate; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </p>
                                <div class="flex">
                                    <p class="text-3xl text-red-500 font-semibold self-end mr-2">${{ $todayBook->sale_price }}</p>
                                    <p class="text-md text-gray-500 font-normal line-through self-end">${{ $todayBook->original_price }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


            {{-- TRENDING BOOKS --}}
            <div class="">
                <h3 class="text-3xl font-bold text-gray-800 uppercase pb-10">trending books</h3>
                <div class="grid grid-flow-row grid-cols-6 grid-rows-{{ intdiv(count($trendingBooks),6) + (count($trendingBooks) % 6 > 0 ? 1 : 0) }} gap-4">
                    @foreach ($trendingBooks as $trendingBook)
                        <div class="text-left justify-self-center mb-5">
                            <a href="/products/{{ $trendingBook->id }}">
                                <img src="{{ asset('images/' . $trendingBook->image_path) }}" alt="" class="hover:shadow-lg">
                                <p class="text-gray-600 text-md capitalize pt-2">{{ $trendingBook->name }}</p>
                                <p class="text-xs text-yellow-300 pt-1">
                                    @for ($i = 0; $i < $trendingBook->rate; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) { slides[i].style.display = "none"; }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 5000);
        }
    </script>
@endsection