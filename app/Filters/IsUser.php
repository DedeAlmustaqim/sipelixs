<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsSkpd implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Logika pengecekan akses
        if (session('akses') != 3 ) {
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return true;
    }
}
