<?php

namespace App\Http\Controllers;

use App\Http\Services\StatementService;
use App\Models\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function __construct(protected StatementService $service)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->service->index();

        return view("/pages/statements/index")
            ->with(["orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function show(Statement $statement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function edit(Statement $statement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statement $statement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statement $statement)
    {
        //
    }

    /*
     * Search by Customer Name
     */
    public function byCustomerName(Request $request)
    {
        $orders = $this->service->byCustomerName($request);

        return view("/pages/statements/index")
            ->with(["orders" => $orders]);
    }

    /*
     * Search by Status
     */
    public function byStatus(Request $request)
    {
        $orders = $this->service->byStatus($request);

        return view("/pages/statements/index")
            ->with(["orders" => $orders]);
    }
}
