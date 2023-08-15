<?php

namespace App\Http\Controllers;

use App\Models\ProfitLoss;
use App\Models\purchased_order;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ProfitLossController extends Controller
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
        $consolidate = ProfitLoss::orderBy('id', 'DESC')->paginate(5);
        // dd($consolidate);
        return view('profit_loss.index', compact('consolidate'));
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


    public function active($id)
    {
        if (Auth::user()->role_as == '1') {
            // dd($id);
            $profit_loss = ProfitLoss::find($id);
            $profit_loss->status = 1;
            $profit_loss->update();
            return back();
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
    public function inactive($id)
    {
        if (Auth::user()->role_as == '1') {
            // dd($id);
            $profit_loss = ProfitLoss::find($id);
            $profit_loss->status = 0;
            $profit_loss->update();
            return back();
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
}
