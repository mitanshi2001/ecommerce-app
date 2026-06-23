<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $cart = auth()->user()->cart()->with('items.product')->first();
        if(!$cart || $cart->items->count() == 0) {
            return redirect()->route('home')->with('error', 'Your cart is empty');
        }
        
        $total = $cart->items->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('store.checkout', compact('cart', 'total'));
    }

    public function process(Request $request) {
        $request->validate([
            'billing_address' => 'required|string',
            'shipping_address' => 'required|string',
        ]);

        $cart = auth()->user()->cart()->with('items.product')->first();
        if(!$cart || $cart->items->count() == 0) {
            return redirect()->route('home');
        }

        $total = $cart->items->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $total,
            'status' => 'Pending',
            'billing_address' => $request->billing_address,
            'shipping_address' => $request->shipping_address,
        ]);

        foreach($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Clear cart
        $cart->items()->delete();

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
