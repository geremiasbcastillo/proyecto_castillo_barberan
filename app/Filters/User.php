<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class User implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session('perfil_id') == 1 || session('perfil_id') == null) { 
            return redirect()->to('/inicio');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}