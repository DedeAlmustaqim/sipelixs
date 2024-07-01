<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (!function_exists('generate_qr_code')) {
    function generate_qr_code($text, $size = 300) {
        // Membuat instance QR code
        $qrCode = QrCode::create($text)
            ->setSize($size);

        // Membuat writer untuk menghasilkan QR code dalam format PNG
        $writer = new PngWriter();

        // Menghasilkan gambar QR code
        $qrCodeResult = $writer->write($qrCode);

        // Mengembalikan gambar dalam bentuk data URI
        return $qrCodeResult->getDataUri();
    }
}
