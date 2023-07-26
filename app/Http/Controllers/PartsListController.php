<?php

namespace App\Http\Controllers;

use App\Models\Parts_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PartsListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_as == '1') {
            $parts = Parts_list::orderBy('id', 'DESC')->paginate(15);
            return view('parts.index', compact('parts'));
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
            return view('parts.create_parts_list');
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
            // dd($request->image);
            $fileName = $this->uploadImage($request->file('image'));
            $request_data = [
                'requested_part_no' => $request->requested_part_no,
                'requested_nomenclature' => $request->requested_nomenclature,
                'cat_part_no' => $request->cat_part_no,
                'cat_nomenclature' => $request->cat_nomenclature,
                'nsn' => $request->nsn,
                'classification' => $request->classification,
                'lead_time' => $request->lead_time,
                'weight' => $request->weight,
                'surplus_price' => $request->surplus_price,
                'fs_price' => $request->fs_price,
                'navister_price' => $request->navister_price,
                'declared_price' => $request->declared_price,
                'image' => $fileName
            ];
            Parts_list::create($request_data);
            return redirect()->route('parts_list.index')->with('message', 'Successfully Created!');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Parts_list $parts_list)
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
    public function edit(Parts_list $parts_list)
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
    public function update(Request $request, Parts_list $parts_list)
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
    public function destroy(Parts_list $parts_list)
    {
        if (Auth::user()->role_as == '1') {
            //
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/parts'), $fileName);
        // Image::make($image)
        //     ->save(storage_path() . '/app/public/parts/' . $fileName);

        return $fileName;
    }
}
