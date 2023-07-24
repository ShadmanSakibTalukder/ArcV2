<?php

namespace App\Http\Controllers;

use TCPDF;
use League\Csv\Reader;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use App\Models\CatelogPartList;
use Illuminate\Pagination\Paginator;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CatelogPartListController extends Controller
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
        $cat_parts = CatelogPartList::orderBy('id', 'DESC')->paginate(100);
        return view('catelogPartList.index', compact('cat_parts'));
    }

    public function create()
    {
        return view('catelogPartList.create');
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


public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'csv' => 'required|mimes:csv,txt',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $csvPath = $request->file('csv')->getRealPath();
    $rows = array_map('str_getcsv', file($csvPath));
    $headers = array_shift($rows);

    foreach ($rows as $row) {
        if (count($row) >= 5) { // Check if the row has at least 5 columns

            // Extract the correct columns based on their positions
            $item_no = $row[0];
            $smr_code = $row[1];
            $nsn = $row[2];
            $cagec = $row[3];
            $part_no = $row[4];
            $description = $row[5];

            // Check if item_no is an integer, if not, skip this row
            if (!is_numeric($item_no)) {
                continue;
            }

            // Create a new CatelogPartList instance
            $catelogPartList = new CatelogPartList();

            // Set the values for item_no, part_no, nsn, description, and cagec
            $catelogPartList->item_no = $item_no;
            $catelogPartList->part_no = $part_no;
            $catelogPartList->nsn = $nsn;
            $catelogPartList->description = $description;
            $catelogPartList->cagec = $cagec;

            // Save the record
            $catelogPartList->save();
        }
    }

    return redirect()->back()->with('success_message', 'CSV data loaded and saved successfully.');
}


























    /**
     * Display the specified resource.
     */
    public function show(CatelogPartList $catelogPartList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatelogPartList $catelogPartList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatelogPartList $catelogPartList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatelogPartList $catelogPartList)
    {
        //
    }
    // $pdfData[] = [
    //                 'item_no' => $itemNumber,
    //                 'nsn' => $nsn,
    //                 'part_no' => $partNumber,
    //                 'description' => $description,
    //             ];




}
