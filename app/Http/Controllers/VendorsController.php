<?php

namespace App\Http\Controllers;

use App\Models\vendors;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create_vendors');
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
    public function show(vendors $vendors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vendors $vendors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vendors $vendors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vendors $vendors)
    {
        //
    }
}
