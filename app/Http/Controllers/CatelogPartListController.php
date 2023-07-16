<?php

namespace App\Http\Controllers;

use App\Models\CatelogPartList;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Fpdf\Fpdf;
use setasign\Fpdi\Fpdi;

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

            // Extract text content from the uploaded PDF
            $textContent = $this->extractTextFromPDF(storage_path('app/' . $path));

            // Perform data extraction logic on the extracted text
            $pdfData = $this->extractData($textContent);

            // Save the PDF data to the database
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
        $pdf = new Fpdi();

        // Add a page from the PDF file
        $pdf->AddPage();
        $pdf->setSourceFile($pdfPath);
        $tplIdx = $pdf->importPage(1);

        // Get the content of the imported page as a string
        ob_start();
        $pdf->useTemplate($tplIdx);
        $content = ob_get_clean();

        // Extract text from the content using your desired logic
        // For example, you can use regular expressions or string manipulation

        return $content;
    }

    private function extractData($textContent)
    {
        $lines = explode(PHP_EOL, $textContent);

        $pdfData = [];
        foreach ($lines as $line) {
            // Extract the relevant data using regular expressions or string manipulation
            $matches = [];
            if (preg_match('/^(\d+)\s(\w+)\s([\d\-]+)\s(\w+)\s([\w\d]+)\s(.+)\s(\d+)$/', $line, $matches)) {
                $itemNumber = $matches[1];
                $smrCode = $matches[2];
                $nsn = $matches[3];
                $cagec = $matches[4];
                $partNumber = $matches[5];
                $description = $matches[6];
                $quantity = $matches[7];

                // Create an array of extracted data
                $pdfData[] = [
                    'item_no' => $itemNumber,
                    'nsn' => $nsn,
                    'part_no' => $partNumber,
                    'description' => $description,
                ];
            }
        }

        return $pdfData;
    }
}
