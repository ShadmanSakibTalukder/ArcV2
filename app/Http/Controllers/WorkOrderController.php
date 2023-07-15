<?php

namespace App\Http\Controllers;

use App\Models\Work_order;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create_work_order');
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
    public function show(Work_order $work_order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work_order $work_order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work_order $work_order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work_order $work_order)
    {
        //
    }
}
