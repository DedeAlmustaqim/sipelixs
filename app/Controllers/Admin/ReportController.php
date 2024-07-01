<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\Service\WaController;
use App\Models\AdminModel;
use App\Models\LaporanModel;
use App\Models\ReportModel;
use App\Models\UnitModel;
use App\Models\UserModel;

use Dompdf\Dompdf;
use Dompdf\Options;
use Hermawan\DataTables\DataTable;

use function PHPUnit\Framework\isNull;

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
        users.alamat, 
        kecamatan.nm_kec, 
        desa.nm_desa,
        status.ket,
        status.class,
        laporan_konflik.id_petugas, tbl_kategori.kategori
       
        ')
            ->where('laporan_konflik.`status`', 1)
            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('tbl_kategori', 'laporan_konflik.id_kategori = tbl_kategori.id', 'left')
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

        $wa = new WaController();

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



            $adminModel = new AdminModel();
            $admin = $adminModel->where('id', $id_petugas_forward)->first();

            $laporanModel = new LaporanModel();
            $laporan = $laporanModel->where('id', $id)->first();

            $userModel = new UserModel();
            $user = $userModel->where('id', $laporan['user_id'])->first();

            $unitModel = new UnitModel();
            $unit = $unitModel->where('id', $admin['id_unit'])->first();


            // // Pesan untuk admin
            $skpdMessage = 'Laporan Konflik telah diteruskan kepada Anda\n2Nama Pelapor : ' . $user['name'] . '\n2Nama Terlapor : ' . $laporan['nm_terlapor'] . '\n2Deskripsi Laporan : ' . $laporan['deskripsi'] . '\n2Catatan Admin : ' . $catatan . '\n2Login ke Akun Anda untuk menanggapi\n2\n2SIPELIKS ' . date('Y-m-d H:i:s');

            $wa->sendMessage($admin['no_hp'], $skpdMessage);

            // // Pesan untuk user
            $userMessage = 'Laporan anda telah diteruskan kepada ' . $admin['nama'] . '\n2Unit Kerja : ' . $unit['nm_unit'] . '\n2Nama Terlapor : ' . $laporan['nm_terlapor'] . '\n2Catatan Admin : ' . $catatan . '\n2Login ke Akun Anda untuk melihat riwayat tanggapan\n2\n2SIPELIKS ' . date('Y-m-d H:i:s');

            $wa->sendMessage($user['no_hp'], $userMessage);

            // echo $adminMessage.$userMessage;
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
         users.alamat, 
         kecamatan.nm_kec, 
         desa.nm_desa,
         status.ket,
         status.class,
         laporan_konflik.id_petugas
        
         ')
            ->whereNotIn('laporan_konflik.`status`', [1, 3, 4])
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
        $wa = new WaController();
        $model = new ReportModel();

        $request = \Config\Services::request();
        $id = $request->getVar('id_konflik_respond');
        $catatan = $request->getVar('catatan_petugas');
        $status = $request->getVar('status_reply');
        $lampiran = $request->getFile('lampiran_petugas');

        // Tentukan aturan validasi berdasarkan status_reply
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
            ]
        ];

        // Tambahkan aturan validasi untuk lampiran_petugas jika status_reply = 3
        if ($status == 3) {
            $validationRules['lampiran_petugas'] = [
                'label' => 'Lampiran',
                'rules' => 'uploaded[lampiran_petugas]|max_size[lampiran_petugas,10240]|mime_in[lampiran_petugas,image/jpg,image/jpeg,image/png,application/pdf]',
                'errors' => [
                    'uploaded' => 'Lampiran harus diunggah.',
                    'max_size' => 'Ukuran Lampiran tidak boleh lebih dari 10MB.',
                    'mime_in' => 'Lampiran harus berupa file dengan ekstensi jpg, jpeg, png, atau pdf.',
                ]
            ];
        }

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

        // Proses file lampiran jika diunggah
        $imgPath = null;
        if ($lampiran && $lampiran->isValid() && !$lampiran->hasMoved()) {
            $title = date('Y-m-d_H-i-s'); // Ganti spasi dengan underscore dan hapus titik dua
            $fileBaseName = $title;
            $dname = explode(".", $lampiran->getClientName());
            $ext = end($dname);
            $newFileName = $fileBaseName . '.' . $ext;
            $lampiran->move(ROOTPATH . 'public/lampiran/petugas/', $newFileName);
            $imgPath = base_url() . 'public/lampiran/petugas/' . $newFileName;
        } elseif ($status == 3) {
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

        $statusValue = ($status == 3) ? 3 : 2;

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
            $adminModel = new AdminModel();
            $admin = $adminModel->where('id', session('id'))->first();

            $laporanModel = new LaporanModel();
            $laporan = $laporanModel->where('id', $id)->first();

            $userModel = new UserModel();
            $user = $userModel->where('id', $laporan['user_id'])->first();

            $unitModel = new UnitModel();
            $unit = $unitModel->where('id', $admin['id_unit'])->first();

            $statusProgress = ($status == 3) ? "Selesai" : "Dalam Proses";

            // Pesan untuk user
            $userMessage = 'Laporan anda telah ditanggapi oleh ' . $admin['nama'] . '\n2Unit Kerja : ' . $unit['nm_unit'] . '\n2Nama Terlapor : ' . $laporan['nm_terlapor'] . '\n2Status laporan : ' . $statusProgress . '\n2 Catatan Petugas : ' . $catatan . '\n2Login ke Akun Anda untuk melihat riwayat tanggapan\n2\n2SIPELIKS ' . date('Y-m-d H:i:s');

            $wa->sendMessage($user['no_hp'], $userMessage);
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
        users.alamat, 
        kecamatan.nm_kec, 
        desa.nm_desa,
        status.ket,
        status.class,
        tbl_admin.nama,
        tbl_kategori.kategori
       
        ')
            ->whereNotIn('laporan_konflik.`status`', [1, 2])
            ->where('laporan_konflik.id_petugas', session('id'))
            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('tbl_admin', 'laporan_konflik.id_petugas = tbl_admin.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('tbl_kategori', 'laporan_konflik.id_kategori = tbl_kategori.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')
            ->orderBy('laporan_konflik.created_at', 'DESC');
        return DataTable::of($builder)->toJson();
    }

    public function allReport()
    {

        helper(['time']);
        helper(['time', 'tanggal_indo_helper', 'qr_helper']);


        $db = db_connect();
        $builder = $db->table('laporan_konflik')->select('laporan_konflik.id, 
	laporan_konflik.user_id, 
	laporan_konflik.nm_terlapor, 
	laporan_konflik.id_kec, 
	laporan_konflik.id_desa, 
	laporan_konflik.alamat as alamat_terlapor, 
	laporan_konflik.deskripsi, 
	laporan_konflik.lampiran, 
	laporan_konflik.created_at as dibuat, 
	laporan_konflik.updated_at, 
	laporan_konflik.`status`, 
	laporan_konflik.id_petugas, 
	laporan_konflik.updated_by, 
	laporan_konflik.id_kategori, 
	tbl_kategori.kategori, 
	users.id, 
	users.`name`, 
	users.no_hp, 
	users.alamat as alamat_pelapor, 
	users.created_at, 
	users.updated_at, 
	`status`.ket as ket_status, 
	`status`.class, 
	kecamatan.nm_kec, 
	desa.nm_desa, 
	tbl_admin.nama as petugas')

            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('tbl_admin', 'laporan_konflik.id_petugas = tbl_admin.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('tbl_kategori', 'laporan_konflik.id_kategori = tbl_kategori.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')

            ->orderBy('laporan_konflik.id', 'ASC')
            ->get()
            ->getResult();


        // var_dump($builder);
        // Membuat instance DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        foreach ($builder as $item) {
            $item->qr_code = generate_qr_code($item->lampiran);
        }


        $dataPrint = [

            'data' => $builder,



        ];
        $html = view('admin/rekap/all_report', $dataPrint);

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman
        $dompdf->setPaper('Legal', 'landscape');

        // Render HTML ke dalam PDF
        $dompdf->render();

        // Mengirimkan output PDF ke browser
        $dompdf->stream('Laporan Konflik.pdf', [
            'Attachment' => false
        ]);

        exit();
    }

    public function filterReport($where)
    {

        helper(['time']);
        helper(['time', 'tanggal_indo_helper', 'qr_helper']);


        $db = db_connect();
        $builder = $db->table('laporan_konflik')->select('laporan_konflik.id, 
	laporan_konflik.user_id, 
	laporan_konflik.nm_terlapor, 
	laporan_konflik.id_kec, 
	laporan_konflik.id_desa, 
	laporan_konflik.alamat as alamat_terlapor, 
	laporan_konflik.deskripsi, 
	laporan_konflik.lampiran, 
	laporan_konflik.created_at as dibuat, 
	laporan_konflik.updated_at, 
	laporan_konflik.`status`, 
	laporan_konflik.id_petugas, 
	laporan_konflik.updated_by, 
	laporan_konflik.id_kategori, 
	tbl_kategori.kategori, 
	users.id, 
	users.`name`, 
	users.no_hp, 
	users.alamat as alamat_pelapor, 
	users.created_at, 
	users.updated_at, 
	`status`.ket as ket_status, 
	`status`.class, 
	kecamatan.nm_kec, 
	desa.nm_desa, 
	tbl_admin.nama as petugas')

            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('tbl_admin', 'laporan_konflik.id_petugas = tbl_admin.id', 'left')
            ->join('status', 'laporan_konflik.status = status.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('tbl_kategori', 'laporan_konflik.id_kategori = tbl_kategori.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')
            ->where('laporan_konflik.status', $where)
            ->orderBy('laporan_konflik.id', 'ASC')
            ->get()
            ->getResult();




        // var_dump($builder);
        // Membuat instance DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        foreach ($builder as $item) {
            $item->qr_code = generate_qr_code($item->lampiran);
        }


        $dataPrint = [

            'data' => $builder,



        ];
        $html = view('admin/rekap/all_report', $dataPrint);

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman
        $dompdf->setPaper('Legal', 'landscape');

        // Render HTML ke dalam PDF
        $dompdf->render();

        // Mengirimkan output PDF ke browser
        $dompdf->stream('Laporan Konflik.pdf', [
            'Attachment' => false
        ]);

        exit();
    }

    public function printDetail($id)
    {
        helper(['time']);
        helper(['time', 'tanggal_indo_helper', 'qr_helper']);

        $db = db_connect();
        $data = $db->table('laporan_konflik')
            ->select('laporan_konflik.id, 
        laporan_konflik.user_id, 
        laporan_konflik.nm_terlapor, 
        laporan_konflik.id_kec, 
        laporan_konflik.id_desa, 
        laporan_konflik.alamat, 
        laporan_konflik.deskripsi, 
        laporan_konflik.lampiran, 
        laporan_konflik.created_at as laporan_dibuat, 
        laporan_konflik.updated_at as laporan_diupdate, 
        laporan_konflik.`status`, 
        laporan_konflik.id_petugas, 
        laporan_konflik.updated_by, 
        users.id as user_id, 
        users.`name`, 
        users.no_hp, 
        users.alamat as alamat_user, 
        `status`.id, 
        `status`.ket, 
        `status`.class, 
        kecamatan.id as id_kec, 
        kecamatan.nm_kec, 
        desa.id as id_desa, 
        desa.nm_desa, 
        tbl_admin.nama as petugas, 
        tbl_unit.nm_unit,
	    tbl_admin.nip,
        tbl_kategori.kategori,')
            ->join('users', 'laporan_konflik.user_id = users.id', 'left')
            ->join('tbl_admin', 'laporan_konflik.id_petugas = tbl_admin.id', 'left')
            ->join('status', 'laporan_konflik.`status` = `status`.id', 'left')
            ->join('kecamatan', 'laporan_konflik.id_kec = kecamatan.id', 'left')
            ->join('desa', 'kecamatan.id = desa.id_kec AND laporan_konflik.id_desa = desa.id', 'left')
            ->join('tbl_unit', 'tbl_admin.id_unit = tbl_unit.id', 'left')
            ->join('tbl_kategori', 'laporan_konflik.id_kategori = tbl_kategori.id', 'left')
            ->where('laporan_konflik.id', $id)->get()->getRow();

        $data2 = $db->table('reply_konflik')
            ->select('reply_konflik.id, 
        reply_konflik.id_konflik, 
        reply_konflik.catatan_petugas, 
        reply_konflik.lampiran_petugas, 
        reply_konflik.id_admin, 
        reply_konflik.created_at, 
        reply_konflik.status_reply, 
        `status`.id, 
        `status`.ket, 
        `status`.class, 
        tbl_unit.nm_unit,
        tbl_admin.nama, 
        tbl_admin.nip')
            ->join('status', 'reply_konflik.status_reply = status.id', 'left')
            ->join('tbl_admin', 'reply_konflik.id_admin = tbl_admin.id', 'left')
            ->join('tbl_unit', 'tbl_admin.id_unit = tbl_unit.id', 'left')
            
            ->where('id_konflik', $id)->get()->getResult();   // var_dump($data);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        foreach ($data2 as $item) {
            if ($item->lampiran_petugas != null) {
                $item->qr_code = generate_qr_code($item->lampiran_petugas);
            } else {
                $item->qr_code = "Tidak ada lampiran";
            }
        }


        $dataPrint = [

            'data' => $data,
            'reply' => $data2,
            'qr_code' => generate_qr_code($data->lampiran),
        ];
        $html = view('admin/rekap/detail_report', $dataPrint);

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($html);

        // Mengatur ukuran dan orientasi halaman
        $dompdf->setPaper('Legal', 'potrait');

        // Render HTML ke dalam PDF
        $dompdf->render();

        // Mengirimkan output PDF ke browser
        $dompdf->stream('Laporan Konflik Detail.pdf', [
            'Attachment' => false
        ]);

        exit();
    }
}
