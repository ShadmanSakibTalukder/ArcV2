<?php

namespace App\Http\Controllers;

use App\Models\ProfitLoss;
use App\Models\purchased_order;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profit_loss.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pos = purchased_order::all();
        return view('profit_loss.create', compact('pos'));
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
    public function show(ProfitLoss $profitLoss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfitLoss $profitLoss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfitLoss $profitLoss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfitLoss $profitLoss)
    {
        //
    }
}
