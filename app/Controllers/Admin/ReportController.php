<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class ReportController extends BaseController
{
    public function laporan_masuk()
    {
        $data = [
            'title' => 'Laporan Masuk'
        ];
        return view('admin/laporan_masuk', $data);
    }



    public function jsonReport()
    {
        $db = db_connect();
        $builder = $db->table('laporan_konflik')->select('laporan_konflik.id, 
        laporan_konflik.user_id, 
        laporan_konflik.nm_terlapor, 
        laporan_konflik.id_kec, 
        laporan_konflik.id_desa, 
        laporan_konflik.alamat, 
        laporan_konflik.deskripsi, 
        laporan_konflik.lampiran, 
        laporan_konflik.created_at, 
        laporan_konflik.updated_at, 
        laporan_konflik.`status`, 
        users.`name`, 
        users.nik, 
        users.alamat, 
        kecamatan.nm_kec, 
        desa.nm_desa,
        status.ket,
        status.class,
        laporan_konflik.id_petugas
       
        ')
            ->where('laporan_konflik.`status`', 1)
            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')
            ->orderBy('laporan_konflik.created_at', 'DESC');



        return DataTable::of($builder)->toJson();
    }
    public function jsonMonitoring()
    {
        $db = db_connect();
        $builder = $db->table('laporan_konflik')->select('laporan_konflik.id, 
        laporan_konflik.user_id, 
        laporan_konflik.nm_terlapor, 
        laporan_konflik.id_kec, 
        laporan_konflik.id_desa, 
        laporan_konflik.alamat, 
        laporan_konflik.deskripsi, 
        laporan_konflik.lampiran, 
        laporan_konflik.created_at, 
        laporan_konflik.updated_at, 
        laporan_konflik.`status`, 
        users.`name`, 
        users.nik, 
        users.alamat, 
        kecamatan.nm_kec, 
        desa.nm_desa,
        status.ket,
        status.class,
        tbl_admin.nama
       
        ')
            ->whereNotIn('laporan_konflik.`status`', [1])
            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('tbl_admin', 'laporan_konflik.id_petugas = tbl_admin.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')
            ->orderBy('laporan_konflik.created_at', 'DESC');
        return DataTable::of($builder)->toJson();
    }


    public function forwardReport()
    {

        helper(['form', 'url']);
        $db = db_connect();



        $request = \Config\Services::request();
        $id = $request->getVar('id_konflik_forward');

        $id_petugas_forward = $request->getVar('id_petugas_forward');
        $catatan = $request->getVar('catatan_forward');

        $validationRules = [
            'id_konflik_forward' => [
                'label' => 'ID Konflik',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'ID Konflik wajib diisi.',
                    'integer' => 'ID Konflik harus berupa angka.',
                ]
            ],
            'id_unit_forward' => [
                'label' => 'Unit Kerja',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Unit Kerja wajib diisi.',
                    'integer' => ' harus berupa angka.',
                ]
            ],
            'id_petugas_forward' => [
                'label' => 'ID Unit',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Petugas wajib diisi.',
                    'integer' => 'Petugas harus berupa angka.',
                ]
            ],
            'catatan_forward' => [
                'label' => 'Catatan',
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => 'Catatan wajib diisi.',
                    'max_length' => 'Catatan tidak boleh lebih dari 500 karakter.',
                ]
            ],

        ];



        // Validasi input
        if (!$this->validate($validationRules)) {
            $respond = [
                'success' => false,
                'id_konflik_forward' => \Config\Services::validation()->getError('id_konflik_forward'),
                'id_unit_forward' => \Config\Services::validation()->getError('id_unit_forward'),
                'id_petugas_forward' => \Config\Services::validation()->getError('id_petugas_forward'),
                'catatan_forward' => \Config\Services::validation()->getError('catatan_forward'),
            ];
            return $this->response->setJSON($respond);
        }


        // Simpan data ke database
        $db = \Config\Database::connect();
        $builder = $db->table('reply_konflik');
        $tblLaporanKonflik = $db->table('laporan_konflik');
        // Pastikan tidak ada duplikat berdasarkan title
        $data = [
            'id_konflik' => $id,

            'catatan_petugas' => $catatan,
            'status_reply' => 2,
            'id_admin' => session('id')
        ];
        $data2 = [
            'status' => 2,
            'id_petugas' => $id_petugas_forward,
        ];
        $result = $builder->insert($data);
        $tblLaporanKonflik->where('id', $id)->update($data2);
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

    public function monitoring()
    {
        $data = [
            'title' => 'Monitoring Laporan'
        ];
        return view('admin/monitoring', $data);
    }




    public function rejectReport($id)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('laporan_konflik');

        $data = [
            'status' => 4
        ];
        $data2 = [
            'status' => 4,

        ];

        $db->table('laporan_konflik')->where('id', $id)->update($data2);
        $result = $builder->where('id', $id)->update($data);
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

    //SKPD
    public function laporan_masuk_skpd()
    {
        $data = [
            'title' => 'Laporan Masuk'
        ];
        return view('skpd/laporan_masuk', $data);
    }
    public function jsonReportSkpd()
    {
        $db = db_connect();
        $builder = $db->table('laporan_konflik')->select('laporan_konflik.id, 
         laporan_konflik.user_id, 
         laporan_konflik.nm_terlapor, 
         laporan_konflik.id_kec, 
         laporan_konflik.id_desa, 
         laporan_konflik.alamat, 
         laporan_konflik.deskripsi, 
         laporan_konflik.lampiran, 
         laporan_konflik.created_at, 
         laporan_konflik.updated_at, 
         laporan_konflik.`status`, 
         users.`name`, 
         users.nik, 
         users.alamat, 
         kecamatan.nm_kec, 
         desa.nm_desa,
         status.ket,
         status.class,
         laporan_konflik.id_petugas
        
         ')
            ->whereNotIn('laporan_konflik.`status`', [1,3,4])
            ->where('laporan_konflik.id_petugas', session('id'))
            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')
            ->orderBy('laporan_konflik.created_at', 'DESC');



        return DataTable::of($builder)->toJson();
    }

    public function respondReport()
    {
        helper(['form', 'url']);
        $db = db_connect();

        $model = new ReportModel();

        $request = \Config\Services::request();
        $id = $request->getVar('id_konflik_respond');
        $catatan = $request->getVar('catatan_petugas');
        $status = $request->getVar('status_reply');
        $lampiran = $request->getFile('lampiran_petugas');

        $validationRules = [
            'id_konflik_respond' => [
                'label' => 'User ID',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'ID wajib diisi.',
                    'integer' => 'ID harus berupa angka.',
                ]
            ],
            'catatan_petugas' => [
                'label' => 'Catatan',
                'rules' => 'required|max_length[1000]',
                'errors' => [
                    'required' => 'Catatan wajib diisi.',
                    'max_length' => 'Catatan tidak boleh lebih dari 1000 karakter.',
                ]
            ],

            'lampiran_petugas' => [
                'label' => 'Lampiran',
                'rules' => 'uploaded[lampiran_petugas]|max_size[lampiran_petugas,10240]|mime_in[lampiran_petugas,image/jpg,image/jpeg,image/png,application/pdf]',
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
                'errors' => [
                    'id_konflik_respond' => \Config\Services::validation()->getError('id_konflik_respond'),
                    'catatan_petugas' => \Config\Services::validation()->getError('catatan_petugas'),
                    'status_reply' => \Config\Services::validation()->getError('status_reply'),
                    'lampiran_petugas' => \Config\Services::validation()->getError('lampiran_petugas'),
                ],
            ];
            return $this->response->setJSON($respond);
        }

        // Proses file lampiran
        if ($lampiran->isValid() && !$lampiran->hasMoved()) {
            $title = date('Y-m-d_H-i-s'); // Ganti spasi dengan underscore dan hapus titik dua
            $fileBaseName = $title;
            $dname = explode(".", $lampiran->getClientName());
            $ext = end($dname);
            $newFileName = $fileBaseName . '.' . $ext;
            $lampiran->move(ROOTPATH . 'public/lampiran/petugas/', $newFileName);

            $imgPath = base_url() . 'public/lampiran/petugas/' . $newFileName;
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
        $builder = $db->table('reply_konflik');

        if ($status == false) {
            $statusValue = 2;
        } else if ($status == true) {
            $statusValue = 3;
        }
        // Pastikan tidak ada duplikat berdasarkan title
        $data = [
            'id_konflik' => $id,
            'catatan_petugas' => $catatan,
            'id_admin' => session('id'),
            'lampiran_petugas' => $imgPath,
            'status_reply' => $statusValue,
        ];
        $data2 = [
            'status' => $statusValue,

        ];

        $db->table('laporan_konflik')->where('id', $id)->update($data2);
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

    public function successReport()
    {
        $data = [
            'title' => 'Monitoring Laporan'
        ];
        return view('skpd/monitoring', $data);
    }

    public function jsonMonitoringSkpd()
    {
        $db = db_connect();
        $builder = $db->table('laporan_konflik')->select('laporan_konflik.id, 
        laporan_konflik.user_id, 
        laporan_konflik.nm_terlapor, 
        laporan_konflik.id_kec, 
        laporan_konflik.id_desa, 
        laporan_konflik.alamat, 
        laporan_konflik.deskripsi, 
        laporan_konflik.lampiran, 
        laporan_konflik.created_at, 
        laporan_konflik.updated_at, 
        laporan_konflik.`status`, 
        users.`name`, 
        users.nik, 
        users.alamat, 
        kecamatan.nm_kec, 
        desa.nm_desa,
        status.ket,
        status.class,
        tbl_admin.nama
       
        ')
            ->whereNotIn('laporan_konflik.`status`', [1,2])
            ->where('laporan_konflik.id_petugas', session('id'))
            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('tbl_admin', 'laporan_konflik.id_petugas = tbl_admin.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')
            ->orderBy('laporan_konflik.created_at', 'DESC');
        return DataTable::of($builder)->toJson();
    }
}
