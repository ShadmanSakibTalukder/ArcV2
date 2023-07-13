<?php

namespace App\Http\Controllers;

use App\Models\purchased_order;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Pagination\Paginator;

class PurchasedOrderController extends Controller
{
    public function __construct()
    {
        Paginator::useBootstrap();
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $purchaseOrders = purchased_order::orderBy('id', 'DESC')->paginate(5);
        return view('purchased.index', compact('purchaseOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchased.create_purchased_order');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(purchased_order $purchased_order)
    {
        return view('purchased.show', compact('purchased_order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(purchased_order $purchased_order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, purchased_order $purchased_order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(purchased_order $purchased_order)
    {
        $purchased_order->delete();
        return redirect()->back()->with('message', 'Successfully deleted!');
    }

    function purchaseOrderGenerator($purchase_order_id)
    {
        $purchase_order = purchased_order::findOrFail($purchase_order_id);
        $data = ['po' => $purchase_order];
        // return view('purchased.print_po', compact('purchase_order'));
        $pdf = PDF::loadView('purchased.print_po', $data);
        return $pdf->download('Purchase_order' . '.' . 'pdf');
    }
}
