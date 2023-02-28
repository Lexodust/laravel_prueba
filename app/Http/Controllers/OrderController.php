<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('details')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->order_number = $request->input('order_number');
        $order->date = $request->input('date');
        $order->amount = $request->input('amount');
        $order->status = $request->input('status');
        $order->user_id = $request->input('user_id');
        $order->save();

        foreach ($request->input('details') as $detail) {
            $order_detail = new OrderDetail;
            $order_detail->article = $detail['article'];
            $order_detail->quantity = $detail['quantity'];
            $order_detail->price = $detail['price'];
            $order_detail->total = $detail['total'];
            $order_detail->order_id = $order->id;
            $order_detail->save();
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show($id)
    {
        $order = Order::with('details')->find($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::with('details')->find($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_number = $request->input('order_number');
        $order->date = $request->input('date');
        $order->amount = $request->input('amount');
        $order->status = $request->input('status');
        $order->user_id = $request->input('user_id');
        $order->save();

        // Delete existing order details
        $order->details()->delete();

        // Add new order details
        foreach ($request->input('details') as $detail) {
            $order_detail = new OrderDetail;
            $order_detail->article = $detail['article'];
            $order_detail->quantity = $detail['quantity'];
            $order_detail->price = $detail['price'];
            $order_detail->total = $detail['total'];
            $order_detail->order_id = $order->id;
            $order_detail->save();
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->details()->delete();
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
?>