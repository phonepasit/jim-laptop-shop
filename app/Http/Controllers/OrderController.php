<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.order.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.order.detail', [
            'order' => $order
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|integer|in:1,2,3,4',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Order status updated successfully.');
    }
}
