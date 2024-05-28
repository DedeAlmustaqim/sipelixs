<?php

namespace App\Controllers\Service;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LokasiService extends BaseController
{
    public function getKecamatanJson()
    {
        $db = db_connect();
        $data = $db->table('kecamatan')->get()->getResult();
        if ($data) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
                ->setJSON($data);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setJSON(['message' => 'Not found']);
        }
    }

    public function getDesaJson($id)
    {
        $db = db_connect();
        $data = $db->table('desa')->where('id_kec', $id)->get()->getResult();
        if ($data) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
                ->setJSON($data);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setJSON(['message' => 'Not found']);
        }
    }
}
