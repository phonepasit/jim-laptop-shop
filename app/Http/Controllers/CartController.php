<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[] = $product;
        session(['cart' => $cart]);

        return redirect()->route('home')->with('success', 'Product added to cart successfully');
    }
}
