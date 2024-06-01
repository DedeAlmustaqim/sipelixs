<?php

namespace App\Controllers\Service;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UnitController extends BaseController
{
    public function getUnitJson()
    {
        $db = db_connect();
        $data = $db->table('tbl_unit')->get()->getResult();
        if ($data) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
                ->setJSON($data);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setJSON(['message' => 'Not found']);
        }
    }

    public function getPetugas($id)
    {
        $db = db_connect();
        $data = $db->table('tbl_admin')->where('id_unit', $id)->get()->getResult();
        if ($data) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
                ->setJSON($data);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setJSON(['message' => 'Not found']);
        }
    }
}
