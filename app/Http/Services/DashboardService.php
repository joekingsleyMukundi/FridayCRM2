<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function index()
    {
        return [
            "users" => $this->users(),
            "orders" => $this->orders(),
            "revenue" => $this->revenue(),
            "products" => $this->products(),
            "ordersLastWeek" => $this->ordersLastWeek(),
            "revenueLastWeek" => $this->revenueLastWeek(),
        ];
    }

    /*
     * Get Users Data
     */
    public function users()
    {
        $total = User::where("account_type", "normal")->count();

        $yesterday = User::where("created_at", Carbon::now()->subDay())->count();

        $today = User::where("created_at", Carbon::now())->count();

        // Resolve for Division by Zero
        if ($yesterday > 0) {
            $growth = $today / $yesterday * 100;
        } else {
            $growth = $today * 100;
        }

        return [
            "total" => $total,
            "growth" => $growth,
        ];
    }

    /*
     * Get Orders
     */
    public function orders()
    {
        $total = Order::count();

        $orders = Order::orderBy("id", "DESC")->paginate(10);

        $yesterday = Order::where("created_at", Carbon::now()->subDay())->count();

        $today = Order::where("created_at", Carbon::now())->count();

        // Resolve for Division by Zero
        if ($yesterday > 0) {
            $growth = $today / $yesterday * 100;
        } else {
            $growth = $today * 100;
        }

        return [
            "total" => $total,
            "growth" => $growth,
            "list" => $orders,
        ];
    }

    /*
     * Get Revenue
     */
    public function revenue()
    {
        $total = Order::sum('total_value');

        $yesterday = Order::where("created_at", Carbon::now()->subDay())->sum("total_value");

        $today = Order::where("created_at", Carbon::now())->sum("total_value");

		// Resolve for Division by Zero
        if ($yesterday > 0) {
            $growth = $today / $yesterday * 100;
        } else {
            $growth = $today * 100;
        }

        return [
            "total" => number_format($total),
            "growth" => number_format($growth),
        ];
    }

    /*
     * Get Products
     */
    public function products()
    {
        $total = Product::count();

        $topProducts = Product::withCount('orders')
            ->groupBy('products.id', 'products.name', 'products.created_at', 'products.updated_at')
            ->orderBy('orders_count', 'desc')
            ->get();

        $yesterday = Product::where("created_at", Carbon::now()->subDay())->count();

        $today = Product::where("created_at", Carbon::now())->count();

        // Resolve for Division by Zero
        if ($yesterday > 0) {
            $growth = $today / $yesterday * 100;
        } else {
            $growth = $today * 100;
        }

        return [
            "total" => $total,
            "top" => $topProducts,
            "growth" => $growth,
        ];
    }

    /*
     * Get Orders Last Week
     */
    public function ordersLastWeek()
    {
        // Get Users By Day
        $startDate = Carbon::now()->subWeek()->startOfWeek();
        $endDate = Carbon::now()->subWeek()->endOfWeek();

        $getOrdersLastWeek = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('orders.created_at')
            ->get()
            ->map(function ($item) {
                return [
                    "day" => Carbon::parse($item->date)->dayName,
                    "count" => $item->count,
                ];
            });

        $ordersLastWeekLabels = $getOrdersLastWeek->map(fn($item) => $item["day"]);
        $ordersLastWeekData = $getOrdersLastWeek->map(fn($item) => $item["count"]);

        return [
            "labels" => $ordersLastWeekLabels,
            "data" => $ordersLastWeekData,
        ];
    }

    /*
     * Get Revenue Last Week
     */
    public function revenueLastWeek()
    {

        // Get Users By Day
        $startDate = Carbon::now()->subWeek()->startOfWeek();
        $endDate = Carbon::now()->subWeek()->endOfWeek();

        $getRevenueLastWeek = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(total_value) as sum'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('orders.created_at')
            ->get()
            ->map(function ($item) {
                return [
                    "day" => Carbon::parse($item->date)->dayName,
                    "sum" => $item->sum,
                ];
            });

        $revenueLastWeekLabels = $getRevenueLastWeek->map(fn($item) => $item["day"]);
        $revenueLastWeekData = $getRevenueLastWeek->map(fn($item) => $item["sum"]);

        return [
            "labels" => $revenueLastWeekLabels,
            "data" => $revenueLastWeekData,
        ];
    }
}
