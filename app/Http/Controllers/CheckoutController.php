<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'note' => 'nullable|string',
                'phone' => 'required|string',
                'district' => 'required|string',
                'ward' => 'required|string',
                'province' => 'required|string',
                'address' => 'required|string',
            ]);

            \DB::beginTransaction();

            // Create the order
            $order = new Order();
            $order->user_id = auth()->id(); // Assuming you have authentication
            $order->note = $validatedData['note'];
            $order->total_price = $request['total_price'];
            $order->phone = $validatedData['phone'];
            $order->district = $validatedData['district'];
            $order->ward = $validatedData['ward'];
            $order->province = $validatedData['province'];
            $order->address = $validatedData['address'];
            $order->status = 1;
            $order->save();

            // Process order details
            foreach ($this->setCartWithSession() as $product) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $product['id'];
                $orderDetail->quantity = $product['quantity_choose'];
                $orderDetail->price = $product['price_total'];
                $orderDetail->save();

                // Update product quantity
                $productModel = Product::findOrFail($product['id']);
                $productModel->quantity -= $product['quantity_choose'];
                $productModel->save();
            }

            $request->session()->forget('cart');

            \DB::commit();

            return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again later.');
        }
    }

    private function setCartWithSession()
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

        return $productDetails;
    }
}
