<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class SettingController extends BaseController
{
    public function pengguna()
    {
        $data = [
            'title' => 'Pengguna'
        ];
        return view('admin/pengguna', $data);
    }

    public function jsonPengguna()
    {
        $db = db_connect();
        $builder = $db->table('users')->select('users.id, 
	users.`name`, 
	users.no_hp, 
	users.alamat, 
	users.active, 
	users.created_at, 
	users.updated_at
        ')

            ->orderBy('users.id', 'ASC');



        return DataTable::of($builder)->toJson();
    }


    public function unit()
    {
        $data = [
            'title' => 'Unit Kerja'
        ];
        return view('admin/unit', $data);
    }

    public function jsonUnit()
    {
        $db = db_connect();
        $builder = $db->table('tbl_unit')->select('tbl_unit.id, 
	tbl_unit.nm_unit, 
	tbl_unit.created_at, 
	tbl_unit.updated_at')
            // ->whereNotIn('tbl_unit.id_akses', [1])
            ->orderBy('tbl_unit.id', 'ASC');



        return DataTable::of($builder)->toJson();
    }

    public function jsonPetugas($id)
    {
        $db = db_connect();
        $builder = $db->table('tbl_admin')->select('tbl_admin.id, 
	tbl_admin.username, 
	tbl_admin.`password`, 
	tbl_admin.nama, 
	tbl_admin.nip, 
	tbl_admin.email, 
	tbl_admin.created_at, 
	tbl_admin.updated_at, 
	tbl_admin.last_login, 
	tbl_admin.id_unit, 
	tbl_admin.no_hp')
            ->where('tbl_admin.id_unit', $id)
            ->orderBy('tbl_admin.id', 'ASC');



        return DataTable::of($builder)->toJson();
    }
}
