<?php

namespace App\Http\Controllers;

use App\Models\CatelogPartList;
use Illuminate\Http\Request;


use Smalot\PdfParser\Parser;
use Spatie\PdfToText\Pdf;

class CatelogPartListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat_parts = CatelogPartList::all();
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
    public function store(Request $request)
    {
        $pdfPath = $request->file('pdf')->getRealPath();
        $text = (new Pdf())->setPdf($pdfPath)->text();

        $lines = explode(PHP_EOL, $text);
        $data = [];
        foreach ($lines as $line) {
            // Ignore blank lines or lines containing only whitespace
            if (trim($line) === '') {
                continue;
            }

            // Extract relevant data using regular expressions
            if (preg_match('/(\d+)\sPAFZZ\s([\d-]+)\s([\w\d]+)\s(.+)/', $line, $matches)) {
                $itemNo = $matches[1];
                $nsn = $matches[2];
                $partNo = $matches[3];
                $description = $matches[4];

                $data[] = [
                    'item_no' => $itemNo,
                    'nsn' => $nsn,
                    'part_no' => $partNo,
                    'description' => $description,
                ];
            }
        }

        // Save the extracted data to your database table
        CatelogPartList::insert($data);

        return redirect()->back()->with('message', 'PDF data saved successfully.');
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



    private function extractTextFromPDF($pdfPath)
    {
        $parser = new Parser();
        $pdf = $parser->parseFile($pdfPath);
        $textContent = $pdf->getText();

        return $textContent;
    }

    private function extractData($textContent)
    {
        // Perform data extraction logic on the extracted text
        // Adjust this logic according to your specific data format and requirements

        $lines = explode(PHP_EOL, $textContent);
        $pdfData = [];

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip empty lines
            if (empty($line)) {
                continue;
            }

            $data = [];

            // Extract data from the line
            preg_match('/^(\d+)\s(\w+)\s([\d\-]+)\s(\w+)\s([\w\d]+)\s(.+)\s(\d+)$/', $line, $matches);

            if (!empty($matches)) {
                $data = [
                    'item_no' => $matches[1],
                    'nsn' => $matches[3],
                    'part_number' => $matches[5],
                    'description' => $matches[6],
                ];
            }

            $pdfData[] = $data;
        }

        return $pdfData;
    }
}
