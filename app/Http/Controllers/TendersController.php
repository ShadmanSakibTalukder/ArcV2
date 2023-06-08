<?php

namespace App\Http\Controllers;

use App\Models\tenders;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class TendersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenders.create_tenders');
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
    public function show(tenders $tenders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tenders $tenders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tenders $tenders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tenders $tenders)
    {
        //
    }
}
