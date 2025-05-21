<?php

namespace App\Http\Controllers\Letter\Report;
use App\Models\Letter\Collection\CollectionAreaM;
use App\Models\Letter\Letter\LetterM;
use setasign\Fpdi\Fpdi;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReporteCorrespondenciaC extends Controller
{
    public function generatePdf($id)
    {
        $LetterM = new LetterM();
        $collectionAreaM = new CollectionAreaM();
        $data = $LetterM->getDataReport($id);
        $copy = $collectionAreaM->getDataCopia($id);

        $pdfPath = public_path('assets/documents/template-pdf/templateCorrespondencia.pdf'); // Ruta del archivo PDF existenteF
        $pdf = new Fpdi(); // Instancia de FPDI (requiere TCPDF o FPDF)
        $pdf->setSourceFile($pdfPath); // Cargar la plantilla PDF existente
        $template = $pdf->importPage(1); // Importar la primera página del PDF existente
        $pdf->addPage(); // Agregar una página en blanco
        $pdf->useTemplate($template); // Usar la plantilla importada
        $fechaActual = Carbon::now(); //Fecha actual para el reporte   

        $areasPosiciones = [
            'CATASTRO' => [46, 96],
            'CONTABILIDAD' => [46, 100],
            'COORDINACIÓN ADMINISTRATIVA' => [46, 103],
            'COORDINACIÓN DE INFORMATICA' => [46, 107],
            'COORDINACIÓN DE INGRESOS' => [46, 110],
            'COORDINACIÓN DE PREDIAL' => [46, 113.7],
            'COORDINACIÓN DE RECUPERACION DE CREDITOS ' => [46, 117],
            'COORDINACIÓN JURIDICA' => [46, 120.6],
            'COORDINACIÓN OPERATIVA' => [46, 124],
            'EGRESOS' => [46, 127.5],
            'SECRETARÍA PARTICULAR' => [46, 131],
            'SECRETARÍA TÉCNICA' => [46, 134],
        ];

        $pdf->SetFont('ZapfDingbats', '', 9); // Fuente para caracteres especiales como la palomita

        foreach ($areasPosiciones as $area => [$x, $y]) {
            if (in_array($area, $copy)) {
                $pdf->SetTextColor(0, 128, 0); // Verde
                $pdf->SetXY($x, $y);
                $pdf->Write(0, '4'); // Palomita en ZapfDingbats (código 4)
            }
        }


        $pdf->SetFont('Helvetica', '', 9); // Fuente Arial normal
        $pdf->SetTextColor(0, 0, 0);   // Color negro

        //DATA DATE ACTUAL
        $pdf->SetXY(174.9, 40.3); // Posición X, Y en el PDF
        $pdf->Write(0, $fechaActual = now()->format('d/m/Y'));

        //DATA NUM TURNO
        $pdf->SetXY(46, y: 56); // Posición X, Y en el PDF
        $pdf->Write(0, $data->num_turno_sistema);

        //DATA NUM DOCUMENTO
        $pdf->SetXY(46, 61.9); // Posición X, Y en el PDF
        $pdf->Write(0, $data->num_documento);


        //DATA FOLIO DE GESTION
        $pdf->SetXY(46, 68.2); // Posición X, Y en el PDF
        $pdf->Write(0, $data->folio_gestion);

        //FECHA DE INICIO
        $pdf->SetXY(176, y: 56); // Posición X, Y en el PDF
        $pdf->Write(0, $data->fecha_inicio);

        //FECHA DE FIN 
        $pdf->SetXY(176, 61.9); // Posición X, Y en el PDF
        $pdf->Write(0, $data->fecha_fin);

        //FECHA DE DOCUMENTO
        $pdf->SetXY(176, 68.2); // Posición X, Y en el PDF
        $pdf->Write(0, $data->fecha_documento);


        //DATA UNIDAD
        $pdf->SetXY(46, 74.4); // Posición X, Y en el PDF
        $pdf->MultiCell(0, 4, utf8_decode($data->unidad));

        //DATA COORDINACION
        $pdf->SetXY(46, 85); // Posición X, Y en el PDF
        $pdf->Write(0, utf8_decode($data->coordinacion));

        //DATA AREA
        $pdf->SetFont('Helvetica', '', 9); // Fuente Arial normal
        $pdf->SetXY(46, 91.4); // Posición X, Y en el PDF
        $pdf->Write(0, utf8_decode($data->area));

        //DATA TRAMITE
        $pdf->SetFont('Helvetica', '', 9); // Fuente Arial normal
        $pdf->SetXY(46, 139.6); // Posición X, Y en el PDF
        $pdf->Write(0, utf8_decode($data->tramite));

        //DATA CODIGO
        $pdf->SetXY(46, 146.4); // Posición X, Y en el PDF
        $pdf->Write(0, $data->codigo);

        //DATA REMITENTE
        $pdf->SetXY(46, 151.5); // Posición X, Y en el PDF
        $pdf->MultiCell(0, 4, utf8_decode($data->remitente));

        //DATA PUESTO REMITENTE
        $pdf->SetXY(46, 157.8); // Posición X, Y en el PDF
        $pdf->MultiCell(0, 4, utf8_decode($data->puesto_remitente));


        //DATA ASUNTO
        $pdf->SetXY(46, 167.6); // Posición X, Y en el PDF
        $pdf->MultiCell(0, 4, utf8_decode($data->asunto));

        //DATA LUGAR
        $pdf->SetXY(46, 191.5); // Posición X, Y en el PDF
        $pdf->MultiCell(0, 4, utf8_decode($data->entidad));

        //DATA OBSERVACIONES
        $pdf->SetXY(46, 198.4); // Posición X, Y en el PDF
        $pdf->MultiCell(0, 4, utf8_decode($data->observaciones));

        //DATA USUARIO
        $pdf->SetXY(46, 219.3); // Posición X, Y en el PDF
        $pdf->Write(0, utf8_decode($data->user_area));


        // Enviar el PDF generado al navegador
        return response($pdf->Output('I'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="pdf-modificado.pdf"');
    }
}
