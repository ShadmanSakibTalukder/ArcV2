<?php

namespace App\Http\Controllers;

use App\Models\purchased_order;
use Illuminate\Http\Request;

class PurchasedOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchased.index');
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
        //
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
        //
    }
}
