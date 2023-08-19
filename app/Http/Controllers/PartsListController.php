<?php

namespace App\Http\Controllers;

use App\Models\Parts_list;
use App\Models\VendorPrice;
use App\Models\vendors;
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
            $parts = Parts_list::orderBy('id', 'DESC')->paginate(50);

            return view('parts.index', compact('parts'));
        } else {
            return redirect()->back()->with('success_message', 'Access not Authorised');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role_as == '1') {
            $existingPartNos = Parts_list::pluck('requested_part_no')->toArray();
            $catPartNo = Parts_list::pluck('cat_part_no')->toArray();

            $vendor = vendors::all();
            return view('parts.create', compact('existingPartNos', 'catPartNo', 'vendor'));
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
            if ($request->file('image') != null) {
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
                    'declared_price' => $request->declared_price,
                    'image' => $fileName
                ];
            } else {
                $request_data = [
                    'requested_part_no' => $request->requested_part_no,
                    'requested_nomenclature' => $request->requested_nomenclature,
                    'cat_part_no' => $request->cat_part_no,
                    'cat_nomenclature' => $request->cat_nomenclature,
                    'nsn' => $request->nsn,
                    'classification' => $request->classification,
                    'lead_time' => $request->lead_time,
                    'weight' => $request->weight,
                    'declared_price' => $request->declared_price,

                ];
            }
            $part = Parts_list::create($request_data);


            if ($request->vendor) {
                foreach ($request->vendor as $key => $item) {
                    $part->vendorPrice()->create([
                        'part_id' => $part->id,
                        'vendor_id' => $item,
                        'price' => $request->price[$key] ?? 0
                    ]);
                }
            }


            // return redirect()->route('parts_list.index')->with('success_message', 'Successfully Created!');
            return redirect()->back()->with('success_message', 'Successfully Created!');
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
            $prices = $parts_list->vendorPrice->pluck('vendor_id')->toArray();
            $vendor = vendors::whereNotIn('id', $prices)->get();
            return view('parts.edit', compact('parts_list', 'prices', 'vendor'));
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
            // dd($request->image);
            if ($request->file('image') != null) {
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

                    'declared_price' => $request->declared_price,
                    'image' => $fileName
                ];
            } else {
                $request_data = [
                    'requested_part_no' => $request->requested_part_no,
                    'requested_nomenclature' => $request->requested_nomenclature,
                    'cat_part_no' => $request->cat_part_no,
                    'cat_nomenclature' => $request->cat_nomenclature,
                    'nsn' => $request->nsn,
                    'classification' => $request->classification,
                    'lead_time' => $request->lead_time,
                    'weight' => $request->weight,

                    'declared_price' => $request->declared_price,
                ];
            }
            $parts_list->update($request_data);

            if ($request->vendor) {
                foreach ($request->vendor as $key => $item) {
                    $parts_list->vendorPrice()->create([
                        'part_id' => $parts_list->id,
                        'vendor_id' => $item,
                        'price' => $request->price[$key] ?? 0
                    ]);
                }
            }

            return redirect()->route('parts_list.index')->with('message', 'Successfully Updated!');
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
            $parts_list->delete();
            return redirect()->back()->with('success_message', 'Successfully Deleted!');
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
    function vendorPriceUpdate(Request $request, $vendorPrice_id)
    {
        // dd($request->part_id);
        // var_dump($request->parts_id);
        $partPrice = Parts_list::findOrFail($request->part_id)->vendorPrice()->where('id', $vendorPrice_id)->first();
        $partPrice->update([
            'price' => $request->price
        ]);
        return response()->json(['message' => 'Price Updated']);
    }

    public function deleteVendorPrice($vendorPrice_id)
    {
        try {
            $vendor_price = VendorPrice::findOrFail($vendorPrice_id);
            $vendor_price->delete();
            return response()->json(['message' => 'Price Deleted']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Size not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error occurred while deleting the size'], 500);
        }
    }
}
