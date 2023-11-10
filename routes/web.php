<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::middleware("auth")->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name("dashboard");

    Route::resources([
        "users" => UserController::class,
        "orders" => OrderController::class,
        "products" => ProductController::class,
        "statements" => StatementController::class,
    ]);

    /*
     * Invoice
     */
    Route::get("/invoices", [OrderController::class, "invoiceIndex"]);
    Route::put("/invoices/{id}", [OrderController::class, "updateInvoiceStatus"]);

    /*
     * Statement
     */
    Route::get("statement-by-customer-name", [StatementController::class, "byCustomerName"])
        ->name("statements.by.customer.name");
    Route::get("statement-by-status", [StatementController::class, "byStatus"])
        ->name("statements.by.status");
});

Auth::routes();
