<?php

namespace App\Http\Controllers;

use App\Http\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct(protected DashboardService $service)
	{
		// 
	}

    public function index()
	{
		$this->service->index();

		return view("index");
	}
}
