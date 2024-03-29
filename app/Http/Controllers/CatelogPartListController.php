<?php

namespace App\Http\Controllers;

use TCPDF;
use League\Csv\Reader;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use App\Models\CatelogPartList;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CatelogPartListController extends Controller
{
    public function __construct()
    {
        Paginator::useBootstrap();
    }

    public function showCatalogBook()
    {
        Log::info('Reached showCatalogBook method');
        if (Auth::user()->role_as == '1') {
            return view('catelogPartList.showCatalog');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_as == '1') {
            $cat_parts = CatelogPartList::orderBy('id', 'ASC')->paginate(100);
            return view('catelogPartList.index', compact('cat_parts'));
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    public function create()
    {
        if (Auth::user()->role_as == '1') {
            return view('catelogPartList.create');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }


    //
    // public function store(Request $request)
    // {
    //     $pdfPath = $request->file('pdf')->getRealPath();
    //     $parser = new Parser();
    //     $pdf = $parser->parseFile($pdfPath);

    //     $requestedData = ['1'];

    //     $data = [];

    //     foreach ($pdf->getPages() as $page) {
    //         $text = $page->getText();
    //         $lines = explode(PHP_EOL, $text);
    //         $pattern = '/^(\d+)\s(\w+)\s([\d-]+)\s([\w\d]+)\s(.+)(\n|$)/m';

    //         foreach ($lines as $line) {
    //             if (trim($line) === '') {
    //                 continue;
    //             }

    //             preg_match($pattern, $line, $matches);

    //             if (isset($matches[1]) && $matches[1] !== '') {
    //                 if (in_array($matches[1], $requestedData)) {
    //                     // Separate part_no and description
    //                     $partNo = '';
    //                     $description = '';
    //                     $cagec = '';

    //                     if (isset($matches[4])) {
    //                         // Extract Cagec value
    //                         $cagec = $matches[4];
    //                     }

    //                     if (isset($matches[5])) {
    //                         // Extract part number and description
    //                         $lineData = explode(' ', $matches[5], 2);
    //                         if (count($lineData) === 2) {
    //                             $partNo = $lineData[0];
    //                             $description = $lineData[1];
    //                         }
    //                     }

    //                     $data[] = [
    //                         'item_no' => $matches[1],
    //                         'nsn' => $matches[3],
    //                         'part_no' => $partNo,
    //                         'description' => $description,
    //                         'cagec' => $cagec,
    //                     ];
    //                 }
    //             }
    //         }
    //     }

    //     // Save the catalog parts to the database
    //     CatelogPartList::insert($data);

    //     return redirect()->back()->with('success_message', 'PDF data loaded and saved successfully.');
    // }


    // public function store(Request $request)
    // {
    //     if (Auth::user()->role_as == '1') {
    //         $validator = Validator::make($request->all(), [
    //             'csv' => 'required|mimes:csv,txt',
    //         ]);

    //         if ($validator->fails()) {
    //             return redirect()->back()->withErrors($validator)->withInput();
    //         }

    //         $csvPath = $request->file('csv')->getRealPath();
    //         $rows = array_map('str_getcsv', file($csvPath));
    //         $headers = array_shift($rows);
    //         // dd($headers);

    //         foreach ($rows as $row) {
    //             dd(count($row));
    //             if (count($row) >= 5) { // Check if the row has at least 5 columns

    //                 // Extract the correct columns based on their positions
    //                 $item_no = isset($row[0]) ? $row[0] : null;
    //                 $smr_code = isset($row[1]) ? $row[1] : null;
    //                 $nsn = isset($row[2]) ? $row[2] : null;
    //                 $cagec = isset($row[3]) ? $row[3] : null;
    //                 $part_no = isset($row[4]) ? $row[4] : null;
    //                 $description = isset($row[5]) ? $row[5] : null;
    //                 $page_no = isset($row[6]) ? $row[6] : null;

    //                 // Check if item_no is an integer, if not, skip this row
    //                 if (!is_numeric($item_no)) {
    //                     continue;
    //                 }

    //                 // Create a new CatelogPartList instance
    //                 $catelogPartList = new CatelogPartList();

    //                 // Set the values for item_no, part_no, nsn, description, and cagec
    //                 $catelogPartList->item_no = $item_no;
    //                 $catelogPartList->part_no = $part_no;
    //                 $catelogPartList->nsn = $nsn;
    //                 $catelogPartList->description = $description;
    //                 $catelogPartList->cagec = $cagec;
    //                 $catelogPartList->page_no = $page_no;

    //                 // Save the record
    //                 $catelogPartList->save();
    //             } else {
    //                 return redirect()->back()->with('message', 'Something went wrong');
    //             }
    //         }

    //         return redirect()->back()->with('success_message', 'CSV data loaded and saved successfully.');
    //     } else {
    //         return redirect()->back()->with('message', 'Access not Authorised');
    //     }
    // }



    public function store(Request $request)
    {
        if (Auth::user()->role_as == '1') {
            $validator = Validator::make($request->all(), [
                'excel' => 'required|mimes:xlsx,xls',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $excelPath = $request->file('excel')->getRealPath();

            // Load Excel file using Laravel Excel
            $rows = Excel::toArray([], $excelPath);

            foreach ($rows[0] as $row) {
                // Modify the column indices according to your Excel file structure
                $item_no = isset($row[0]) ? $row[0] : null;
                $smr_code = isset($row[1]) ? $row[1] : null;
                $nsn = isset($row[2]) ? $row[2] : null;
                $cagec = isset($row[3]) ? $row[3] : null;
                $part_no = isset($row[4]) ? $row[4] : null;
                $description = isset($row[5]) ? $row[5] : null;
                $page_no = isset($row[7]) ? $row[7] : null;

                // Check if item_no is an integer, if not, skip this row
                if (!is_numeric($item_no)) {
                    continue;
                }

                // Create a new CatalogPartList instance
                $catalogPartList = new CatelogPartList();

                // Set the values for attributes
                $catalogPartList->item_no = $item_no;
                $catalogPartList->part_no = $part_no;
                $catalogPartList->nsn = $nsn;
                $catalogPartList->description = $description;
                $catalogPartList->cagec = $cagec;
                $catalogPartList->page_no = $page_no;

                // Save the record
                $catalogPartList->save();
            }

            return redirect()->back()->with('success_message', 'Excel data loaded and saved successfully.');
        } else {
            return redirect()->back()->with('message', 'Access not Authorized');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(CatelogPartList $catelogPartList)
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
    public function edit(CatelogPartList $catelogPartList)
    {
        if (Auth::user()->role_as == '1') {
            return view('catelogPartList.edit', compact('catelogPartList'));
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatelogPartList $catelogPartList)
    {
        if (Auth::user()->role_as == '1') {
            $requestedData = [
                'item_no' => $request->item_no,
                'part_no' => $request->part_no,
                'nsn' => $request->nsn,
                'cagec' => $request->cagec,
                'page_no' => $request->page_no,
                'description' => $request->description,
            ];
            $catelogPartList->update($requestedData);
            return redirect()->back()->with('success_message', 'Updated Successfully!');
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatelogPartList $catelogPartList)
    {
        if (Auth::user()->role_as == '1') {
            //
        } else {
            return redirect()->back()->with('message', 'Access not Authorised');
        }
    }
    // $pdfData[] = [
    //                 'item_no' => $itemNumber,
    //                 'nsn' => $nsn,
    //                 'part_no' => $partNumber,
    //                 'description' => $description,
    //             ];



}
