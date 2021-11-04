@extends('layouts.app')
@section('content')
    <div class="flex justify-center my-10">
        <div class="w-4/5 bg-white p-20 rounded-lg">
            <div class="">
                <h3 class="text-3xl font-bold text-gray-800 uppercase">Lara Group</h3>
                <p class="text-lg text-gray-600 italic pb-5">Rental Books website - Laravel framework</p>
                <div>
                    <div class="grid grid-flow-row grid-cols-3 grid-rows-1 gap-0">
                        <div class="justify-self-center">
                            <div class="shadow-lg mt-10">
                                <div>
                                    <img src="{{ asset('images/root/mem-1.jpg') }}" style="width:100%">
                                </div>
                                <div class="text-center py-3">
                                    <h3 class="text-gray-800 text-lg font-semibold uppercase">Brian Cohen</h3>
                                    <h4 class="text-gray-600 text-md italic">Co-founder</p>
                                    <div class="flex justify-center pt-2">
                                        <a href="">
                                            <i class="fab fa-facebook-f mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-twitter mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-linkedin-in mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-google mr-3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="justify-self-center">
                            <div class="shadow-lg mt-20">
                                <div class="text-center py-3">
                                    <h3 class="text-gray-800 text-lg font-semibold uppercase">Elizabeth Barnes</h3>
                                    <h4 class="text-gray-600 text-md italic">Co-founder</p>
                                    <div class="flex justify-center pt-2">
                                        <a href="">
                                            <i class="fab fa-facebook-f mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-twitter mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-linkedin-in mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-google mr-3"></i>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <img src="{{ asset('images/root/mem-2.jpg') }}" style="width:100%">
                                </div>
                            </div>
                        </div>

                        <div class="justify-self-center">
                            <div class="shadow-lg">
                                <div>
                                    <img src="{{ asset('images/root/mem-3.jpg') }}" style="width:100%">
                                </div>
                                <div class="text-center py-3">
                                    <h3 class="text-gray-800 text-lg font-semibold uppercase">Esther Rodriguez</h3>
                                    <h4 class="text-gray-600 text-md italic">Co-founder</p>
                                    <div class="flex justify-center pt-2">
                                        <a href="">
                                            <i class="fab fa-facebook-f mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-twitter mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-linkedin-in mr-3"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-google mr-3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection