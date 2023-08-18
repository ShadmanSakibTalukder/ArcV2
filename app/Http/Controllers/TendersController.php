<?php

namespace App\Http\Controllers;

use App\Models\CatelogPartList;
use App\Models\tenders;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role_as == '1') {
            $tenderList = tenders::orderBy('id', 'DESC')->paginate(15);
            return view('tenders.index', compact('tenderList'));
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role_as == '1') {
            return view('tenders.create_tenders');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role_as == '1') {
            //
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tenders $tender)
    {
        if (Auth::user()->role_as == '1') {
            $cat_part = CatelogPartList::all();
            return view('tenders.show', compact('tender', 'cat_part'));
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tenders $tenders)
    {
        if (Auth::user()->role_as == '1') {
            //
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tenders $tenders)
    {
        if (Auth::user()->role_as == '1') {
            //
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tenders $tender)
    {
        if (Auth::user()->role_as == '1') {
            // dd($tender);
            $tender->delete();
            return redirect()->back()->with('success_message', 'Successfully deleted!');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    public function active($id)
    {
        if (Auth::user()->role_as == '1') {
            // dd($id);
            $tender = tenders::find($id);
            $tender->status = 1;
            $tender->update();
            return back();
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
    public function inactive($id)
    {
        if (Auth::user()->role_as == '1') {
            // dd($id);
            $tender = tenders::find($id);
            $tender->status = 0;
            $tender->update();
            return back();
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
}
