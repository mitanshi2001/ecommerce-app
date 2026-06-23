<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cart = auth()->user()->cart()->with('items.product')->first();
        return view('store.cart', compact('cart'));
    }

    public function add(Request $request, $product_id) {
        $product = Product::findOrFail($product_id);
        $cart = auth()->user()->cart()->firstOrCreate([]);
        
        $cartItem = $cart->items()->where('product_id', $product->id)->first();
        if($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id) {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cartItem = CartItem::findOrFail($id);
        if($cartItem->cart->user_id == auth()->id()) {
            $cartItem->update(['quantity' => $request->quantity]);
        }
        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove($id) {
        $cartItem = CartItem::findOrFail($id);
        if($cartItem->cart->user_id == auth()->id()) {
            $cartItem->delete();
        }
        return redirect()->route('cart.index')->with('success', 'Item removed!');
    }
}
