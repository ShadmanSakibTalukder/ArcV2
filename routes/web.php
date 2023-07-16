<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\CatelogPartListController;
use App\Http\Controllers\TendersController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\PartsListController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\PurchasedOrderController;
use App\Models\CatelogPartList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin/work_orders', WorkOrderController::class);
Route::resource('admin/parts_list', PartsListController::class);
Route::resource('admin/tenders', TendersController::class);
Route::resource('admin/purchased_order', PurchasedOrderController::class);
Route::resource('admin/catelog_part_list', CatelogPartListController::class);

Route::get('purchase-order/pdf/{id}', [PurchasedOrderController::class, 'purchaseOrderGenerator'])->name('purchased_order.pdf_download');


Route::resource('admin/vendors', VendorsController::class);
Route::resource('admin/buyers', BuyersController::class);
