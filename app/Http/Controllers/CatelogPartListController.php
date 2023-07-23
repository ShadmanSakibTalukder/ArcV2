<?php

namespace App\Http\Controllers;

use App\Models\CatelogPartList;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;


use TCPDF;

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
    $csvPath = $request->file('csv')->getRealPath();
    $data = array_map('str_getcsv', file($csvPath));

    $requestedData = ['1'];

    $rows = [];
    foreach ($data as $row) {
        // Assuming the CSV format: ITEM, SMR, NSN, CAGEC, PART, DESCRIPTION AND USABLE ON
        $itemNo = $row[0];
        $smrCode = $row[1];
        $nsn = $row[2];
        $cagec = $row[3];
        $partNo = $row[4];
        $description = $row[5];

        // Skip the row if item_no is not numeric
        if (!is_numeric($itemNo)) {
            continue;
        }

        // Add the row data with a flag indicating missing data
        $rows[] = [
            'item_no' => $itemNo,
            'smr_code' => $smrCode,
            'nsn' => $nsn,
            'cagec' => $cagec,
            'part_no' => $partNo,
            'description' => $description,
            'has_missing_data' => empty($partNo) || empty($nsn),
        ];

        // Save the catalog part to the database if it doesn't have missing data
        if (!$rows[count($rows) - 1]['has_missing_data']) {
            CatelogPartList::create([
                'item_no' => $itemNo,
                'part_no' => $partNo,
                'cagec' => $cagec,
                'nsn' => $nsn,
                'description' => $description,
            ]);
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
