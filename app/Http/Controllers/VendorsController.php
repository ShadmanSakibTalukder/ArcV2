<?php

namespace App\Http\Controllers;

use App\Models\vendors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_as == '1') {
            $vendors = vendors::orderBy('id', 'DESC')->paginate(30);
            return view('vendors.index', compact('vendors'));
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
            return view('vendors.create_vendors');
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
            $requestData = [
                'name' => $request->name,
                'vendor_address' => $request->vendor_address
            ];
            vendors::create($requestData);
            return redirect()->back()->with('success_message', 'Successfully Created!');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(vendors $vendors)
    {
        if (Auth::user()->role_as == '1') {
            //
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vendors $vendors)
    {
        if (Auth::user()->role_as == '1') {
            return view('vendors.edit', compact('vendors'));
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vendors $vendors)
    {
        if (Auth::user()->role_as == '1') {
            $requestData = [
                'name' => $request->name,
                'vendor_address' => $request->vendor_address
            ];
            $vendors->update($requestData);
            return redirect()->back()->with('message', 'Successfully Updated!');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vendors $vendors)
    {
        if (Auth::user()->role_as == '1') {
            $vendors->delete();
            return redirect()->back()->with('success_message', 'Successfully deleted!');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
}
