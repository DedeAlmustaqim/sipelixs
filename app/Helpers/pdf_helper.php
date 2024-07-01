<?php

use Dompdf\Dompdf;
use Dompdf\Options;

if (!function_exists('generate_pdf')) {
    function generate_pdf($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = 'portrait') {
        // Mengatur opsi DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Memuat konten HTML
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi kertas
        $dompdf->setPaper($paper, $orientation);

        // Merender HTML ke PDF
        $dompdf->render();

        // Output hasil PDF
        if ($stream) {
            $dompdf->stream($filename, array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }
}
