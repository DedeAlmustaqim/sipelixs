<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Service\WaController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function sigin()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }



    public function index()
    {
        $data = [
            'title' => 'Daftar'
        ];
        return view('auth/register', $data);
    }

    public function login()
    {
        $userModel = new UserModel();

        $user = $userModel->table('users')
            ->where('no_hp', $this->request->getVar('no_hp'))
            ->first();
        if ($user) {
            if (password_verify($this->request->getVar('password'), $user['password'])) {

                session()->set('masuk', true);
                if ($user['active'] == '1') { //Akses admin
                    session()->set('login', true);
                    session()->set('id', $user['id']);
                    session()->set('name', $user['name']);
                    session()->set('akses', 3);
                    return redirect('dashboard');
                } else {
                    $noHp = $user['no_hp'];
                    $encodedEmail = base64_encode($noHp);
                    // Buat URL untuk redireksi ke halaman verifikasi dengan parameter encoded email
                    $verificationUrl = base_url('/register/verifikasi') . '/' . $encodedEmail;

                    // Redirect pengguna ke URL verifikasi
                    return redirect()->to($verificationUrl);
                }
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }
    function logout()
    {
        session()->destroy();
        return redirect('/');
    }

    public function register()
    {

        $waController = new WaController();
        helper('text');
        helper('password');
        $model = new UserModel();
        // Mendapatkan instance request
        $request = \Config\Services::request();

        // Mendapatkan data dari form
        $name = $request->getVar('name');
        // $nik = $request->getVar('nik');
        $alamat = $request->getVar('alamat');
        // $email = $request->getVar('email');
        $no_hp = $request->getVar('no_hp');
        $password = $request->getVar('password');


        // Aturan validasi
        $validationRules = [
            'name' => [
                'label' => 'Nama',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Nama wajib diisi.',
                    'max_length' => 'Nama tidak boleh lebih dari 50 karakter.'
                ]
            ],
            // 'nik' => [
            //     'label' => 'NIK',
            //     'rules' => 'required|exact_length[16]|numeric',
            //     'errors' => [
            //         'required' => 'NIK wajib diisi.',
            //         'exact_length' => 'NIK harus terdiri dari 16 karakter.',
            //         'numeric' => 'NIK hanya boleh berisi angka.'
            //     ]
            // ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Alamat wajib diisi.',
                    'max_length' => 'Alamat tidak boleh lebih dari 100 karakter.'
                ]
            ],
            'no_hp' => [
                'label' => 'No. Telp/HP/WA',
                'rules' => 'required|min_length[11]|max_length[12]|numeric',
                'errors' => [
                    'required' => 'Nomor telepon wajib diisi.',
                    'min_length' => 'Nomor telepon minimal 11 karakter.',
                    'max_length' => 'Nomor telepon maksimal 12 karakter.',
                    'numeric' => 'Nomor telepon hanya boleh berisi angka.'
                ]
            ],
            // 'email' => [
            //     'label' => 'Email',
            //     'rules' => 'required|valid_email',
            //     'errors' => [
            //         'required' => 'Email wajib diisi.',
            //         'valid_email' => 'Format email tidak valid.'
            //     ]
            // ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password wajib diisi.',
                    'min_length' => 'Password minimal harus terdiri dari 6 karakter.'
                ]
            ],
            'confirm_password' => [
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi.',
                    'matches' => 'Konfirmasi password harus sama dengan password.'
                ]
            ],
            'checkbox_privasi' => [
                'label' => 'Kebijakan Privasi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Anda harus menyetujui kebijakan privasi kami.'
                ]
            ]
        ];

        // Melakukan validasi
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan respons JSON dengan pesan kesalahan
            $respond = [
                'success' => false,
                'name' => \Config\Services::validation()->getError('name'),
                // 'nik' => \Config\Services::validation()->getError('nik'),
                'alamat' => \Config\Services::validation()->getError('alamat'),
                'no_hp' => \Config\Services::validation()->getError('no_hp'),
                // 'email' => \Config\Services::validation()->getError('email'),
                'password' => \Config\Services::validation()->getError('password'),
                'confirm_password' => \Config\Services::validation()->getError('confirm_password'),
                'checkbox_privasi' => \Config\Services::validation()->getError('checkbox_privasi')
            ];

            return $this->response->setJSON($respond);
        }

        // Jika validasi berhasil, lanjutkan proses pendaftaran
        // Misalnya, menyimpan data ke database, dll.
        // $existingUser = $model->where('nik', $nik)->first();
        // $existingEmail = $model->where('email', $email)->first();
        $existingNoHp = $model->where('no_hp', $no_hp)->first();
        // if ($existingUser) {
        //     $respond = [
        //         'success' => false,
        //         'nik' => 'NIK sudah digunakan. Silakan masukkan NIK yang lain.'
        //     ];
        //     return json_encode($respond);
        // }
        // if ($existingEmail) {
        //     $respond = [
        //         'success' => false,
        //         'email' => 'Email sudah digunakan. Silakan masukkan Email yang lain.'
        //     ];
        //     return json_encode($respond);
        // }
        if ($existingNoHp) {
            $respond = [
                'success' => false,
                'no_hp' => 'No Hp sudah digunakan. Silakan masukkan No Hp yang lain.'
            ];
            return json_encode($respond);
        }
        $randomNumber = random_int(100000, 999999);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = [
            'name' => $name,
            // 'nik' => $nik,
            'no_hp' => $no_hp,
            // 'email' => $email,
            'alamat' => $alamat,
            'active_code' => $randomNumber,
            'password' => $hashedPassword,

        ];

        // echo $user;

        $result = $model->insert($user);


        if ($result) {
            $msg = 'Masukkan Kode OTP Mama Keyan Sayang ' . $randomNumber.',  Terima Kasih sudah mendaftar SIPELIKS'; // Pesan yang ingin dikirim
            $encodedNoHp = base64_encode($no_hp);
            $waController->sendMessage($no_hp, $msg);
            // return redirect()->to(base_url('/register/verifikasi/' . $encodedNoHp));

            // return json_encode(['success' => true, 'no_hp' => $encodedNoHp]);
            return $this->response->setJSON([
                'success' => true,
                'no_hp' => $encodedNoHp
            ]);
        } else {
            return json_encode(['success' => false, 'message' => 'Gagal menyimpan data.']);
        }

        // $respond = [
        //     'success' => true,
        //     'message' => 'Pendaftaran berhasil.'
        // ];


    }

    public function verifikasi($noHp)
    {        // Decode the URL-encoded email
        $noHp = base64_decode($noHp);

        // Retrieve user by email if necessary, for example:
        // $model = new UserModel();
        // $user = $model->where('email', $email)->first();

        $data = [
            'title' => 'Verifikasi Email',
            'noHp' => $noHp
            // You can pass the user data if you retrieved it
        ];

        return view('auth/verifikasi', $data);
    }

    public function otp()
    {
        $userModel = new UserModel();

        // Cari user berdasarkan nomor HP
        $user = $userModel->table('users')
            ->where('no_hp', $this->request->getVar('no_hp_otp'))
            ->first();

        if ($user) {
            // Periksa apakah kode OTP sesuai
            if ($this->request->getVar('kode_otp') == $user['active_code']) {
                // Update status user menjadi aktif
                $data = ['active' => 1];
                $result = $userModel->where('no_hp', $this->request->getVar('no_hp_otp'))->set($data)->update();

                if ($result) {
                    // Berhasil verifikasi
                    $respond = [
                        'success' => true,
                        'message' => 'Berhasil Verifikasi',
                    ];
                } else {
                    // Gagal mengupdate data
                    $respond = [
                        'success' => false,
                        'message' => 'Gagal update',
                    ];
                }
            } else {
                // Kode OTP salah
                $respond = [
                    'success' => false,
                    'message' => 'Kode OTP salah',
                ];
            }
        } else {
            // User tidak ditemukan
            $respond = [
                'success' => false,
                'message' => 'Nomor HP tidak ditemukan',
            ];
        }

        // Mengembalikan respon dalam format JSON
        return $this->response->setJSON($respond);
    }
}
