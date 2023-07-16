<?php

namespace App\Http\Controllers;

use App\Models\CatelogPartList;
use Illuminate\Http\Request;


use Smalot\PdfParser\Parser;


class CatelogPartListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('catelogPartList.index');
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
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');

            // Validate the file if needed

            // Determine the storage path and generate a unique filename
            $path = $file->store('pdfs'); // Store in the 'storage/app/pdfs' directory

            // Extract data from the uploaded PDF
            $textContent = $this->extractTextFromPDF(storage_path('app/' . $path));

            // Perform data extraction logic on the extracted text
            $pdfData = $this->extractData($textContent);

            // Save the extracted data to the database
            CatelogPartList::insert($pdfData);

            return redirect()->back()->with('success', 'PDF uploaded and data extracted successfully.');
        }

        return redirect()->back()->with('error', 'No PDF file selected.');
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
