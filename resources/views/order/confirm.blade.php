@extends('layouts.app')

@section('content')
    <div class="flex justify-center my-10">
        <div class="w-2/5 bg-white p-10 rounded-lg">
            <div class="text-center">
                <i class="far fa-check-circle text-green-500 text-7xl"></i>
                <h3 class="text-3xl font-bold text-gray-800 pt-5">Your order is completed!</h3>
                <p class="text-lg font-normal text-gray-600 pt-2">You will be receiving a confirmation email with order details</p>
            </div>            
        </div>
    </div>
@endsection