<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
class ReportController extends Controller
{
     public function generatePDF(Request $request)
    {
        // Obtain the records
        $artists = Artist::select('id', 'name', 'lastname', 'instrument')->get();

        // Check
        if ($artists->isEmpty()) {
            return response()->json(['error' => 'No data'], 404);
        }

        //Load pdf view
        $html = view('pdf_reports.artist', ['artists' => $artists])->render();

        // Create the PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();
        $filename = "ListOfArtists.pdf";

        return response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }
}
