<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $product->quantity_choose = 1;

        $cart = session()->get('cart', []);
        $cart[] = $product;
        session(['cart' => $cart]);

        return redirect()->route('home')->with('success', 'Product added to cart successfully');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $cartTotal = [];

        foreach ($cart as $item) {
            $id = $item->id;
            $price = $item->price_sale;
            $quantity_choose = $item->quantity_choose;

            // Check if the product ID exists in $cartTotal
            if (isset($cartTotal[$id])) {
                // If exists, update quantity and calculate total price
                $cartTotal[$id]['quantity_choose'] += $quantity_choose;
                $cartTotal[$id]['price_total'] += ($price * $quantity_choose);
            } else {
                // If not exists, add new entry
                $cartTotal[$id] = [
                    'id' => $id,
                    'quantity_choose' => $quantity_choose,
                    'price' => $price,
                    'price_total' => $price * $quantity_choose,
                ];
            }
        }

        // Convert $cartTotal array to indexed array
        $cartTotal = array_values($cartTotal);

        $productDetails = [];

        foreach ($cartTotal as $item) {
            $productId = $item['id'];
            $product = Product::findOrFail($productId);

            // Add product details to $productDetails array
            $productDetails[] = [
                'id' => $product->id,
                'category_id' => $product->category_id,
                'name' => $product->name,
                'description' => $product->description,
                'image' => $product->image,
                'price' => $product->price,
                'price_sale' => $product->price_sale,
                'quantity' => $product->quantity,
                'quantity_choose' => $item['quantity_choose'],
                'price_total' => $item['price_total'],
            ];
        }

        return view('layouts.web', [
            'productDetails' => $productDetails,
        ]);
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        // Find the product in the cart
        $key = array_search($id, array_column($cart, 'id'));

        // If the product is found
        if ($key !== false) {
            // Get the product object
            $product = $cart[$key];

            // Clone the product object to avoid indirect modification error
            $product = clone $product;

            // Increment or decrement the quantity based on the button clicked
            if ($request->has('increment')) {
                $product->quantity_choose++;
            } elseif ($request->has('decrement')) {
                $product->quantity_choose--;
            }

            // Update the product in the cart
            $cart[$key] = $product;

            // Update the session cart
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Update quantity successfully!');
    }

    public function delete($id)
    {
        $cart = session()->get('cart', []);

        $key = array_search($id, array_column($cart, 'id'));

        if ($key !== false) {
            unset($cart[$key]);
            $cart = array_values($cart);
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Delete product successfully!');
    }
}
