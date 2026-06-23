<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {
        $products = Product::latest()->take(8)->get();
        $categories = Category::all();
        return view('store.home', compact('products', 'categories'));
    }

    public function categories() {
        $categories = Category::all();
        return view('store.categories', compact('categories'));
    }

    public function categoryProducts($id) {
        $category = Category::findOrFail($id);
        $products = $category->products()->paginate(12);
        return view('store.category_products', compact('category', 'products'));
    }

    public function productDetails($id) {
        $product = Product::findOrFail($id);
        return view('store.product_details', compact('product'));
    }
}
