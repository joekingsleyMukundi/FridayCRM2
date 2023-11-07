<?php

namespace App\Http\Services;

use App\Http\Resources\StatementResource;
use App\Models\Order;

class StatementService
{
    /*
     * List Statements
     */
    public function index()
    {
        $orders = Order::orderBy("id", "DESC")->paginate();

        return StatementResource::collection($orders);
    }

    public function byCustomerName($request)
    {
        $search = $request->input("search");

        $orders = Order::join("users", "users.id", "=", "orders.user_id")
            ->where("users.name", "LIKE", "%$search%")
            ->get();

        return StatementResource::collection($orders);
    }
}
