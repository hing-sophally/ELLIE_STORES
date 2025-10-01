<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User; // Changed from Customer to User
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Display pending orders
    public function pending()
    {
        $orders = Order::with('user')->where('status', 'pending')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Display processing orders
    public function processing()
    {
        $orders = Order::with('user')->where('status', 'processing')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Display completed orders
    public function completed()
    {
        $orders = Order::with('user')->where('status', 'completed')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Display cancelled orders
    public function cancelled()
    {
        $orders = Order::with('user')->where('status', 'cancelled')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Show form to edit order
    public function edit(Order $order)
    {
        $users = User::all(); // Changed from customers
        return view('admin.orders.edit', compact('order', 'users'));
    }

    // Update order (status, user, total price)
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_number' => 'required|string|max:255|unique:orders,order_number,' . $order->id,
            'user_id' => 'required|exists:users,id', // Changed from customer_id
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update([
            'order_number' => $request->order_number,
            'user_id' => $request->user_id, // Changed from customer_id
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    // Show order details
    public function show(Order $order)
    {
        $order->load('user', 'items');
        return view('admin.orders.show', compact('order'));
    }

    // Delete order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }

    // Disable create/store in admin panel
    public function create() { abort(404); }
    public function store(Request $request) { abort(404); }
}
