<?php

namespace App\Http\Controllers;

use App\Models\CatelogPartList;
use App\Models\tenders;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TendersController extends Controller
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
        $tenderList = tenders::orderBy('id', 'DESC')->paginate(15);
        return view('tenders.index', compact('tenderList'));
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
    public function show(tenders $tender)
    {
        $cat_part = CatelogPartList::all();
        return view('tenders.show', compact('tender', 'cat_part'));
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
    public function destroy(tenders $tender)
    {
        // dd($tender);
        $tender->delete();
        return redirect()->back()->with('message', 'Successfully deleted!');
    }

    public function active($id)
    {
        // dd($id);
        $tender = tenders::find($id);
        $tender->status = 1;
        $tender->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $tender = tenders::find($id);
        $tender->status = 0;
        $tender->update();
        return back();
    }
}
