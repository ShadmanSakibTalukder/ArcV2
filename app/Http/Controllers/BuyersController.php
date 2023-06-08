<?php

namespace App\Http\Controllers;

use App\Models\buyers;
use Illuminate\Http\Request;

class BuyersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('buyers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buyers.create_buyers');
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
    public function show(buyers $buyers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buyers $buyers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buyers $buyers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buyers $buyers)
    {
        //
    }
}
