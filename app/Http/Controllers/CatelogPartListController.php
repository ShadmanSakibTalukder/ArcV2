<?php

namespace App\Http\Controllers;

use App\Models\CatelogPartList;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;



use Smalot\PdfParser\Parser;
use Spatie\PdfToText\Pdf;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catelogPartList.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    //     $pdfPath = $request->file('pdf')->getRealPath();

    //     $parser = new Parser();
    //     $pdf = $parser->parseFile($pdfPath);

    //     $data = [];
    //     $currentItem = null;
    //     foreach ($pdf->getPages() as $page) {
    //         $text = $page->getText();
    //         $lines = explode(PHP_EOL, $text);
    //         $pattern = '/^(\d+)\s(\w+)\s([\d-]+)\s([\w\d]+)\s(.+)/m';
    //         foreach ($lines as $line) {
    //             // Ignore blank lines or lines containing only whitespace
    //             if (trim($line) === '') {
    //                 continue;
    //             }


    //             // Start of a new item
    //             if (preg_match($pattern, $line, $matches)) {
    //                 // Save the previous item if it exists
    //                 if ($currentItem !== null) {
    //                     $data[] = $currentItem;
    //                 }

    //                 // Start processing a new item
    //                 $currentItem = [
    //                     'item_no' => $matches[1],
    //                     'smr_code' => $matches[2],
    //                     'nsn' => $matches[3],
    //                     'part_no' => $matches[4],
    //                     'description' => $matches[5],
    //                 ];
    //             } else {
    //                 // Multi-line description
    //                 if ($currentItem !== null) {
    //                     $currentItem['description'] .= ' ' . $line;
    //                 }
    //             }
    //             if ($currentItem !== null) {
    //                 $data[] = $currentItem;
    //             }
    //             foreach ($data as $ditem) {
    //                 $catelogPart = new CatelogPartList();
    //                 $catelogPart->item_no = $ditem['item_no'];
    //                 $catelogPart->nsn = $ditem['nsn'];
    //                 $catelogPart->part_no = $ditem['part_no'];
    //                 $catelogPart->description = $ditem['description'];
    //                 $catelogPart->save();
    //             }
    //         }
    //     }



    //     // Save the extracted data to the database
    //     // CatelogPartList::insert($data);

    //     return redirect()->back()->with('success_message', 'PDF data loaded and saved successfully.');
    // }

    // public function store(Request $request)
    // {
    //     $pdfPath = $request->file('pdf')->getRealPath();

    //     $parser = new Parser();
    //     $pdf = $parser->parseFile($pdfPath);

    //     foreach ($pdf->getPages() as $page) {
    //         $text = $page->getText();
    //         $lines = explode(PHP_EOL, $text);
    //         $pattern = '/^(\d+)\s(\w+)\s([\d-]+)\s([\w\d]+)\s(.+)/m';
    //         $data = [];
    //         $currentItem = null;

    //         $data = [];

    //         foreach ($lines as $line) {
    //             // Ignore blank lines or lines containing only whitespace
    //             if (trim($line) === '') {
    //                 continue;
    //             }

    //             // Match the data in the line
    //             preg_match($pattern, $line, $matches);

    //             // Add the data to the array
    //             $data[] = $matches;
    //         }

    //         // Save the last item if it exists
    //         if ($currentItem !== null) {
    //             $data[] = $currentItem;
    //         }

    //         foreach ($data as $ditem) {
    //             $catelogPart = new CatelogPartList();
    //             $catelogPart->item_no = $ditem[1];
    //             $catelogPart->nsn = $ditem[2];
    //             $catelogPart->part_no = $ditem[3];
    //             $catelogPart->description = $ditem[4];
    //             $catelogPart->save();
    //         }
    //     }

    //     return redirect()->back()->with('success_message', 'PDF data loaded and saved successfully.');
    // }

    // public function store(Request $request)
    // {
    //     $pdfPath = $request->file('pdf')->getRealPath();

    //     $parser = new Parser();
    //     $pdf = $parser->parseFile($pdfPath);

    //     $data = [];
    //     $currentItem = [];
    //     foreach ($pdf->getPages() as $page) {
    //         $text = $page->getText();
    //         $lines = explode(PHP_EOL, $text);

    //         foreach ($lines as $line) {
    //             if (preg_match('/^\d+\s+(.+?)\s+(\w+)\s+(\d+-\d+-\d+)\s+(.+)$/', $line, $matches)) {
    //                 // Start of a new item
    //                 if (!empty($currentItem)) {
    //                     $data[] = $currentItem;
    //                 }

    //                 $currentItem = [
    //                     'item_no' => $matches[1],
    //                     'part_no' => $matches[2],
    //                     'nsn' => $matches[3],
    //                     'description' => $matches[4],
    //                 ];
    //             } else {
    //                 // Append to description if not empty
    //                 if (!empty($currentItem) && !empty($line)) {
    //                     $currentItem['description'] .= ' ' . $line;
    //                 }
    //             }
    //         }
    //     }

    //     // Save the last item if it exists
    //     if (!empty($currentItem)) {
    //         $data[] = $currentItem;
    //     }

    //     // Save the extracted data to the database
    //     CatelogPartList::insert($data);

    //     return redirect()->back()->with('success_message', 'PDF data loaded and saved successfully.');
    // }



    // public function store(Request $request)
    // {
    //     $pdfPath = $request->file('pdf')->getRealPath();

    //     $parser = new Parser();
    //     $pdf = $parser->parseFile($pdfPath);

    //     $data = [];

    //     // Define the requested item numbers
    //     $requestedData = ['1', '5', '10'];

    //     foreach ($pdf->getPages() as $page) {
    //         $text = $page->getText();
    //         $lines = explode(PHP_EOL, $text);
    //         $pattern = '/^(\d+)\s(\w+)\s([\d-]+)\s([\w\d]+)\s(.+)(\n|$)/m';

    //         foreach ($lines as $line) {
    //             // Ignore blank lines or lines containing only whitespace
    //             if (trim($line) === '') {
    //                 continue;
    //             }

    //             // Match the data in the line
    //             preg_match($pattern, $line, $matches);

    //             // Check if the matches array has an item_no element
    //             if (count($matches) > 1 && $matches[1] !== '') {
    //                 $itemNo = $matches[1];
    //                 $nsn = $matches[3] ?? null;
    //                 $partNo = $matches[4] ?? null;
    //                 $description = $matches[5] ?? null;

    //                 // Check if the item number is in the requested data
    //                 if (in_array($itemNo, $requestedData) && $partNo !== 'END' && $description !== 'OF FIGURE') {
    //                     $data[] = [
    //                         'item_no' => $itemNo,
    //                         'nsn' => $nsn,
    //                         'part_no' => $partNo,
    //                         'description' => $description,
    //                     ];
    //                 }
    //             }
    //         }
    //     }
    //     dd($data);

    //     // Create catalog part objects from the data array
    //     $catalogParts = [];
    //     foreach ($data as $dataItem) {
    //         $catalogPart = new CatelogPartList();
    //         $catalogPart->item_no = $dataItem['item_no'];
    //         $catalogPart->nsn = $dataItem['nsn'];
    //         $catalogPart->part_no = $dataItem['part_no'];
    //         $catalogPart->description = $dataItem['description'];
    //         $catalogParts[] = $catalogPart;
    //     }

    //     // Save the catalog parts to the database
    //     foreach ($catalogParts as $catalogPart) {
    //         $catalogPart->save();
    //     }

    //     return redirect()->back()->with('success_message', 'PDF data loaded and saved successfully.');
    // }

    public function store(Request $request)
    {
        $pdfPath = $request->file('pdf')->getRealPath();
        $parser = new Parser();
        $pdf = $parser->parseFile($pdfPath);

        $requestedData = ['1'];

        $data = [];

        foreach ($pdf->getPages() as $page) {
            $text = $page->getText();
            $lines = explode(PHP_EOL, $text);
            $pattern = '/^(\d+)\s(\w+)\s([\d-]+)\s([\w\d]+)\s(.+)(\n|$)/m';

            foreach ($lines as $line) {
                if (trim($line) === '') {
                    continue;
                }

                preg_match($pattern, $line, $matches);

                if (
                    isset($matches[1]) && $matches[1] !== ''
                ) {
                    if (in_array($matches[1], $requestedData)) {
                        $data[] = [
                            'item_no' => $matches[1],
                            'nsn' => $matches[3],
                            'part_no' => $matches[4],
                            'description' => $matches[5],
                        ];
                    }
                }
            }
        }
        dd($data);

        // Create catalog part objects from the data array
        $catalogParts = [];
        foreach ($data as $dataItem) {
            $catalogPart = new CatelogPartList();
            $catalogPart->item_no = $dataItem['item_no'];
            $catalogPart->nsn = $dataItem['nsn'];
            $catalogPart->part_no = $dataItem['part_no'];
            $catalogPart->description = $dataItem['description'];
            $catalogParts[] = $catalogPart;
        }

        // Save the catalog parts to the database
        foreach ($catalogParts as $catalogPart) {
            $catalogPart->save();
        }

        return redirect()->back()->with('success_message', 'PDF data loaded and saved successfully.');
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
