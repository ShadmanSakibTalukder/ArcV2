<?php

namespace App\Http\Controllers;

use App\Models\purchased_order;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class PurchasedOrderController extends Controller
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
            $purchaseOrders = purchased_order::orderBy('id', 'DESC')->paginate(5);
            return view('purchased.index', compact('purchaseOrders'));
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
            return view('purchased.create_purchased_order');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
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
        if (Auth::user()->role_as == '1') {
            return view('purchased.show', compact('purchased_order'));
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(purchased_order $purchased_order)
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
    public function update(Request $request, purchased_order $purchased_order)
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
    public function destroy(purchased_order $purchased_order)
    {
        if (Auth::user()->role_as == '1') {
            $purchased_order->delete();
            return redirect()->back()->with('message', 'Successfully deleted!');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    function purchaseOrderGenerator($purchase_order_id)
    {
        $purchase_order = purchased_order::findOrFail($purchase_order_id);
        $data = ['po' => $purchase_order];
        // return view('purchased.print_po', compact('purchase_order'));
        $pdf = PDF::loadView('purchased.print_po', $data);
        // return $pdf->download('Purchase_order' . $purchase_order->po_no . '.' . 'pdf');
        return $pdf->stream('purchased.print_po', $data);
    }


    public function active($id)
    {
        if (Auth::user()->role_as == '1') {
            // dd($id);
            $purchase_order = purchased_order::find($id);
            $purchase_order->status = 1;
            $purchase_order->update();
            return back();
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
    public function inactive($id)
    {
        if (Auth::user()->role_as == '1') {
            // dd($id);
            $purchase_order = purchased_order::find($id);
            $purchase_order->status = 0;
            $purchase_order->update();
            return back();
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
}
