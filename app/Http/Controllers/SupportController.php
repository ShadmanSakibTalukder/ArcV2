<?php

namespace App\Http\Controllers;

use App\Models\MensPurchaseOrder;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        // return view('support.dashboard');
        $mensPurchaseOrder = MensPurchaseOrder::orderBy('id', 'DESC')->paginate(15);
        return view('mens_logistics_purchase_order.index', compact('mensPurchaseOrder'));
    }
}
