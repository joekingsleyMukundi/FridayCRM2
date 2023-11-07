<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardService
{
    public function index()
    {
        $totalUsers = User::count();

        $totalOrders = Order::count();

        $revenue = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->sum('products.price');

        $totalProducts = Product::count();

        $orders = Order::paginate();

        return [
            "totalUsers" => $totalUsers,
            "totalOrders" => $totalOrders,
            "revenue" => number_format($revenue),
            "totalProducts" => $totalProducts,
            "orders" => $orders,
        ];
    }
}
