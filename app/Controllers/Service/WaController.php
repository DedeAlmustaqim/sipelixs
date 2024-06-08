<?php

namespace App\Controllers\Service;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class WaController extends BaseController
{
    public function sendMessage($noHp, $msg)
    {
        $token = "SQlSw9wGPfD21XmERL9t6cBO3xys2niwWjvJyJ99qA4RZp4HkCelXwERdCwjifrd"; // Isi token Anda di sini
        $phone = $noHp; // Ganti dengan nomor telepon tujuan
        $message = urlencode($msg);

        $url = "https://kudus.wablas.com/api/send-message?phone=$phone&message=$message&token=$token";

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $result = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return true;
        }
    }

    public function sendOtp($noHp, $otp)
    {
        $curl = curl_init();
        $token = "SQlSw9wGPfD21XmERL9t6cBO3xys2niwWjvJyJ99qA4RZp4HkCelXwERdCwjifrd"; // Isi token Anda di sini
        $code_otp = $otp;
        $phone = $noHp;
        $encodNoHp = base64_encode($noHp);
        $baseUrl = base_url();
        $payload = [
            "data" => [
                [
                    'phone' => $phone,
                    'message' => [
                        'title' => [
                            'type' => 'text',
                            'content' => 'Verification Code',
                        ],
                        'buttons' => [
                            'url' => [
                                'display' => 'Copy',
                                'link' => $baseUrl . "register/verifikasi/" . $encodNoHp,
                            ],
                        ],
                        'content' => "Kode OTP anda : $code_otp ",
                        'footer' => 'SIPELIKS',
                    ],
                ]
            ]
        ];
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "Content-Type: application/json"
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL,  "https://kudus.wablas.com/api/v2/send-template");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        if ($result) {
            return false;
        } else {
            return true;
        }
    }

    function sendDocument($phone, $doc)
    {
        $curl = curl_init();
        $token = "SQlSw9wGPfD21XmERL9t6cBO3xys2niwWjvJyJ99qA4RZp4HkCelXwERdCwjifrd"; // Isi token Anda di sini
        $data = [
            'phone' => $phone,
            'document' => $doc,
            'caption' => 'caption',
        ];
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL,  "https://kudus.wablas.com/api/send-document");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        if ($result) {
            return false;
        } else {
            return true;
        }
    }

    
}
