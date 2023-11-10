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

        // return  $dashboard;
        return view("index")->with([
            "dashboard" => $dashboard,
        ]);
    }
}
