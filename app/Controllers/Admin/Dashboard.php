<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function dashboard_admin()
    {
        $blm = $this->countReport(1);
        $proses = $this->countReport(2);
        $selesai = $this->countReport(3);
        $ditolak = $this->countReport(4);

        $data = [
            'title' => 'Dashboard',
            'blm' => $blm->id,
            'proses' => $proses->id,
            'selesai' => $selesai->id,
            'ditolak' => $ditolak->id,
        ];
// var_dump($data);
        return view('admin/dashboard', $data);
    }

    public function dashboard_skpd()
    {
        $blm = $this->countReportSkpd(1);
        $proses = $this->countReportSkpd(2);
        $selesai = $this->countReportSkpd(3);
        $ditolak = $this->countReportSkpd(4);

        $data = [
            'title' => 'Dashboard',
            'proses' => $proses->id,
            'selesai' => $selesai->id,
            'ditolak' => $ditolak->id,
        ];
// var_dump($data);
        return view('skpd/dashboard', $data);
    }

    function countReport($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('laporan_konflik');

        $builder->select('COUNT(*) as id');
        $builder->where('status', $id);

        $query = $builder->get();
        return $query->getRow();
    }

    function countReportSkpd($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('laporan_konflik');

        $builder->select('COUNT(*) as id');
        $builder->where('status', $id);
        $builder->where('id_petugas', session('id'));

        $query = $builder->get();
        return $query->getRow();
    }
}
