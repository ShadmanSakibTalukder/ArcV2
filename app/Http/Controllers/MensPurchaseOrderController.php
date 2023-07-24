<?php

namespace App\Http\Controllers;

use App\Models\MensPurchaseOrder;
use Illuminate\Http\Request;

class MensPurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensPurchaseOrder = MensPurchaseOrder::orderBy('id', 'DESC')->paginate(15);
        return view('mens_logistics_purchase_order.index', compact('mensPurchaseOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mens_logistics_purchase_order.create');
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
    // public function show(MensPurchaseOrder $mensPurchaseOrder)
    // {
    //     // dd($mensPurchaseOrderShow);
    //     // return view('mens_logistics_purchase_order.show', compact('mensPurchaseOrder'));
    //     return view('mens_logistics_purchase_order.show', compact('mensPurchaseOrder'));
    // }
    public function show($id)
{
    $mensPurchaseOrder = MensPurchaseOrder::with('mensPurchaseOrderItem')->findOrFail($id);

    return view('mens_logistics_purchase_order.show', compact('mensPurchaseOrder'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MensPurchaseOrder $mensPurchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MensPurchaseOrder $mensPurchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MensPurchaseOrder $mensPurchaseOrder)
    {
        $mensPurchaseOrder->delete();
        return redirect()->back()->with('message', 'Successfully deleted!');
    }
}
