<?php

namespace App\Http\Services;

use App\Http\Resources\InvoiceResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getOrders = Order::orderBy("id", "DESC")->paginate(10);

        $ordersPendingValue = Order::where("status", "pending")
            ->sum("orders.total_value");

        return [$ordersPendingValue, OrderResource::collection($getOrders)];
    }

    /**
     * Show the get data to prefill form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select("id", "name")
            ->orderBy("id", "DESC")
            ->get();

        $products = Product::select("id", "name")
            ->orderBy("id", "DESC")
            ->get();

        return [$users, $products];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        // Calculate Total Value
        $productPrice = Product::find($request->input("product_id"))->price;
        $totalValue = $productPrice +
        $request->input("kra_due") +
        $request->input("kebs_due");

        $order = new Order;
        $order->user_id = $request->input("user_id");
        $order->product_id = $request->input("product_id");
        $order->date = $request->input("date");
        $order->vehicle_registration = $request->input("vehicle_registration");
        $order->entry_number = $request->input("entry_number");
        $order->kra_due = $request->input("kra_due");
        $order->kebs_due = $request->input("kebs_due");
        $order->other_charges = $request->input("other_charges");
        $order->total_value = $totalValue;

        $saved = $order->save();

        $message = "Order created successfully";

        return [$saved, $message, $order];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $order = Order::find($id);

        if ($request->filled("user_id")) {
            $order->user_id = $request->input("user_id");
        }

        if ($request->filled("product_id")) {
            $order->product_id = $request->input("product_id");
        }

        if ($request->filled("date")) {
            $order->date = $request->input("date");
        }

        if ($request->filled("vehicle_registration")) {
            $order->vehicle_registration = $request->input("vehicle_registration");
        }

        if ($request->filled("entry_number")) {
            $order->entry_number = $request->input("entry_number");
        }

        if ($request->filled("kra_due")) {
            $order->kra_due = $request->input("kra_due");
        }

        if ($request->filled("kebs_due")) {
            $order->kebs_due = $request->input("kebs_due");
        }

        if ($request->filled("other_query")) {
            $order->other_query = $request->input("other_query");
        }

        if ($request->filled("total_value")) {
            $order->total_value = $request->input("total_value");
        }

        if ($request->filled("status")) {
            $order->status = $request->input("status");
        }

        $saved = $order->save();

        $message = "Order updated successfully";

        return [$saved, $message, $order];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getOrder = Order::find($id);

        $deleted = $getOrder->delete();

        $message = "Order deleted successfully";

        return [$deleted, $message, $getOrder];
    }

    /*
     * Get Invoices
     */
    public function invoiceIndex()
    {
        $invoices = Order::where("status", "pending")
            ->orderBy("id", "DESC")
            ->paginate(10);

        return InvoiceResource::collection($invoices);
    }

    /*
     * Update Invoice Status
     */
    public function updateInvoiceStatus($id)
    {
        $order = Order::find($id);
        $order->status = "paid";

        $saved = $order->save();

        $message = "Invoice updated successfully";

        return [$saved, $message, $order];
    }
}
