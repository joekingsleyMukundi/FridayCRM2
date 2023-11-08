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
            ->sum('orders.total_value');

        $totalProducts = Product::count();

        $orders = Order::paginate();

        $topProducts = Product::withCount('orders')
            ->groupBy('products.id', 'products.name', 'products.created_at', 'products.updated_at')
            ->orderBy('orders_count', 'desc')
            ->get();

        return [
            "totalUsers" => $totalUsers,
            "totalOrders" => $totalOrders,
            "revenue" => number_format($revenue),
            "totalProducts" => $totalProducts,
            "topProducts" => $topProducts,
            "orders" => $orders,
        ];
    }
}
