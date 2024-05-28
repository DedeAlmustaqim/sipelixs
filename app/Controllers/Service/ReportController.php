<?php

namespace App\Controllers\Service;

use App\Controllers\BaseController;
use App\Models\ReportModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReportController extends BaseController
{
    public function index()
    {
        //
    }

    public function store()
    {

        helper(['form', 'url']);
        $db = db_connect();

        $model = new ReportModel();

        $request = \Config\Services::request();
        $id = $request->getVar('user_id');
        $nm_terlapor = $request->getVar('nm_terlapor');
        $id_kec = $request->getVar('id_kec');
        $id_desa = $request->getVar('id_desa');
        $alamat = $request->getVar('alamat');
        $deskripsi = $request->getVar('deskripsi');
        $lampiran = $request->getFile('lampiran');
        $validationRules = [
            'user_id' => [
                'label' => 'User ID',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'User ID wajib diisi.',
                    'integer' => 'User ID harus berupa angka.',
                ]
            ],
            'nm_terlapor' => [
                'label' => 'Nama Terlapor',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama Terlapor wajib diisi.',
                    'max_length' => 'Nama Terlapor tidak boleh lebih dari 255 karakter.',
                ]
            ],
            'id_kec' => [
                'label' => 'ID Kecamatan',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'ID Kecamatan wajib diisi.',
                    'integer' => 'ID Kecamatan harus berupa angka.',
                ]
            ],
            'id_desa' => [
                'label' => 'ID Desa',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'ID Desa wajib diisi.',
                    'integer' => 'ID Desa harus berupa angka.',
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => 'Alamat wajib diisi.',
                    'max_length' => 'Alamat tidak boleh lebih dari 500 karakter.',
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi wajib diisi.',
                ]
            ],
            'lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'uploaded[lampiran]|max_size[lampiran,10240]|mime_in[lampiran,image/jpg,image/jpeg,image/png,application/pdf]',
                'errors' => [
                    'uploaded' => 'Lampiran harus diunggah.',
                    'max_size' => 'Ukuran Lampiran tidak boleh lebih dari 10MB.',
                    'mime_in' => 'Lampiran harus berupa file dengan ekstensi jpg, jpeg, png, atau pdf.',
                ]
            ],
        ];



        // Validasi input
        if (!$this->validate($validationRules)) {
            $respond = [
                'success' => false,
                'user_id' => \Config\Services::validation()->getError('user_id'),
                'nm_terlapor' => \Config\Services::validation()->getError('nm_terlapor'),
                'id_kec' => \Config\Services::validation()->getError('id_kec'),
                'id_desa' => \Config\Services::validation()->getError('id_desa'),
                'alamat' => \Config\Services::validation()->getError('alamat'),
                'deskripsi' => \Config\Services::validation()->getError('deskripsi'),
                'lampiran' => \Config\Services::validation()->getError('lampiran'),
               
            ];
            return $this->response->setJSON($respond);
        }

        // Proses file lampiran
        if ($lampiran->isValid() && !$lampiran->hasMoved()) {
            $title = date('Y-m-d_H-i-s'); // Ganti spasi dengan underscore dan hapus titik dua
            $nm_terlapor_sanitized = preg_replace('/[^a-zA-Z0-9-_]/', '_', $nm_terlapor); // Hanya izinkan karakter alfanumerik dan underscore
            $fileBaseName = $title . '_' . $nm_terlapor_sanitized;
            $dname = explode(".", $lampiran->getClientName());
            $ext = end($dname);
            $newFileName = $fileBaseName . '.' . $ext;
            $lampiran->move(ROOTPATH . 'public/lampiran/user/', $newFileName);

            $imgPath = base_url() . 'public/lampiran/user/' . $newFileName;
        } else {
            // Handle error if file cannot be moved
            $respond = [
                'success' => false,
                'message' => 'Lampiran tidak valid atau tidak dapat dipindahkan.',
            ];
            return $this->response->setJSON($respond);
        }

        // Simpan data ke database
        $db = \Config\Database::connect();
        $builder = $db->table('laporan_konflik');

        // Pastikan tidak ada duplikat berdasarkan title
        $data = [
            'user_id' => $id,
            'nm_terlapor' => $nm_terlapor,
            'id_kec' => $id_kec,
            'id_desa' => $id_desa,
            'alamat' => $alamat,
            'deskripsi' => $deskripsi,
            'lampiran' => $imgPath,
            'status' => 0,

        ];

        $result = $builder->insert($data);

        if ($result) {
            $respond = [
                'success' => true,
            ];
        } else {
            $respond = [
                'success' => false,
                'message' => 'Gagal menyimpan data.',
            ];
        }
        return $this->response->setJSON($respond);
    }
}
