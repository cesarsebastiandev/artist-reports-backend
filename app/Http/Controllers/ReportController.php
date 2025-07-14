<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
// use Dompdf/Dompdf;
class ReportController extends Controller
{
     public function getPlantsPDF(Request $request)
    {
        // Obtener los registros
        $artists = Artist::select('id', 'name', 'lastname', 'instrument')->get();

        // Verificar si se encontraron registros
        if ($artists->isEmpty()) {
            return response()->json(['error' => 'No data'], 404);
        }

        // Cargar vista para PDF
        $html = view('pdf_reports.artists', ['artists' => $artists])->render();

        // Crear el PDF
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
