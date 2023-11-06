<?php

namespace App\Http\Services;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;

class InvoiceService
{
    /*
     * Get All Invoices
     */
    public function index()
    {
        $invoices = Invoice::where("status", "pending")
            ->orderBy("id", "DESC")
            ->paginate();

        return InvoiceResource::collection($invoices);
    }

    /*
     * Update Invoice
     */
    public function update($request, $id)
    {
        $invoice = Invoice::find($id);

        if ($request->filled("status")) {
            $invoice->status = "paid";
        }

        $saved = $invoice->save();

        $message = "Invoice Updated";

        return [$saved, $message, $invoice];
    }
}
