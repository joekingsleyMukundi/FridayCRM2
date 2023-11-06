<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardService
{
    public function index()
    {
        $users = User::count();

        $orders = Order::count();

        $revenue = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->sum('products.price');

        $products = Product::count();

        return [
            "users" => $users,
            "orders" => $orders,
            "revenue" => number_format($revenue),
            "products" => $products,
        ];
    }
}
