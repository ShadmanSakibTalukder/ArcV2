<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\CatelogPartListController;
use App\Http\Controllers\MensPurchaseOrderController;
use App\Http\Controllers\TendersController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\PartsListController;
use App\Http\Controllers\ProfitLossController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\PurchasedOrderController;
use App\Http\Controllers\SupportController;
use App\Http\Livewire\PurchaseOrderShow;
use App\Models\CatelogPartList;
use App\Models\MensPurchaseOrder;

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
})->name('front_view');

Auth::routes();




Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/work_orders', WorkOrderController::class);
    Route::resource('/parts_list', PartsListController::class);
    Route::resource('/tenders', TendersController::class);
    Route::get('/tenders/active/{id}', [TendersController::class, 'active'])->name('tenders.active');
    Route::get('/tenders/inactive/{id}', [TendersController::class, 'inactive'])->name('tenders.inactive');


    Route::resource('/purchased_order', PurchasedOrderController::class);



    Route::get('/catelog_part_list/book', [CatelogPartListController::class, 'showCatalogBook'])->name('book_show');
    Route::resource('/catelog_part_list', CatelogPartListController::class);


    Route::get('purchase-order/pdf/{id}', [PurchasedOrderController::class, 'purchaseOrderGenerator'])->name('purchased_order.pdf_download');


    Route::resource('/vendors', VendorsController::class);
    Route::resource('/buyers', BuyersController::class);
    Route::resource('/profit_loss', ProfitLossController::class);

    Route::get('/profit_loss/active/{id}', [ProfitLossController::class, 'active'])->name('profit_loss.active');
    Route::get('/profit_loss/inactive/{id}', [ProfitLossController::class, 'inactive'])->name('profit_loss.inactive');
});
Route::prefix('support')->middleware(['auth', 'isSupport'])->group(function () {

    Route::resource('/m_purchase_order', MensPurchaseOrderController::class);


    Route::get('/dashboard', [SupportController::class, 'index'])->name('support.dashboard');
});
