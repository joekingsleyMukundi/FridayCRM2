<?php

namespace App\Http\Services;

use App\Http\Resources\StatementResource;
use App\Models\Order;
use App\Models\Statement;

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
}