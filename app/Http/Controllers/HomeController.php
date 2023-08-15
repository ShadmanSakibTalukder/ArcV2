<?php

namespace App\Http\Controllers;

use App\Models\purchased_order;
use App\Models\tenders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_as == '1') {
            $tender = tenders::all();
            $purchaseOrder = purchased_order::all();


            $tenderReceivedCount = $tender->count();
            $tenderWorkingCount = $tender->where('status', '0')->count();
            $tenderDoneCount = $tender->where('status', '1')->count();

            $totalPOCount = $purchaseOrder->count();
            $workingPOCount = $purchaseOrder->where('status', '0')->count();
            $donePOCount = $purchaseOrder->where('status', '1')->count();

            $processingPurchasePrice = $purchaseOrder->where('status', '0')->sum('total_purchase_price_no');
            $processingDeclaredPrice = $purchaseOrder->where('status', '0')->sum('total_declared_price_no');

            return view('home', compact(
                'tender',
                'purchaseOrder',
                'tenderReceivedCount',
                'tenderWorkingCount',
                'tenderDoneCount',
                'totalPOCount',
                'workingPOCount',
                'donePOCount',
                'processingPurchasePrice',
                'processingDeclaredPrice'
            ));
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
}
