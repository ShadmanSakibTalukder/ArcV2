<?php

namespace App\Http\Controllers;

use App\Models\Parts_list;
use Illuminate\Http\Request;

class PartsListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parts.create_parts_list');
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
    public function show(Parts_list $parts_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parts_list $parts_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parts_list $parts_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parts_list $parts_list)
    {
        //
    }
}
