<?php

namespace App\Http\Controllers;

use App\Http\Services\DashboardService;
use App\Http\Services\OrderService;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $service)
    {
        //
    }

    public function index()
    {
        $dashboard = $this->service->index();

		$orderService = new OrderService;
		
		$orders = $orderService->index();

        // return  $dashboard;
        return view("index")->with([
            "dashboard" => $dashboard,
            "orders" => $orders,
        ]);
    }
}
