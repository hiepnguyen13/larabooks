<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Order;
use App\Mail\ConfirmOrder;

class CheckoutController extends Controller
{
    public function __construct() {

        $this->middleware(['auth']);
        
    }

    public function index()
    {
        $order = DB::table('orders')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $user = auth()->user();
        Mail::to($user)->send(new ConfirmOrder($order));
        return view('order.confirm');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $product = Book::find($request->id);
        $start = Carbon::now();
        $end = Carbon::now()->addDays($request->day);
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1|max:3',
            'day' => 'required|numeric|min:1|max:30'
        ]);
        $stock = $product->quantity - $request->quantity;
        Order::create([
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_author' => $product->author,
            'product_price' => $product->sale_price,
            'quantity' => $request->quantity,
            'start' => $start,
            'end' => $end
        ]);
        Book::where('id', $product->id)
        ->update([
            'quantity' => $stock
        ]);
        return redirect('/checkout');
    }

    public function show($id)
    {
        $product = Book::find($id);
        return view('order.checkout', [
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
