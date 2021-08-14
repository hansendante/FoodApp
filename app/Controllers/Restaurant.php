<?php

namespace App\Controllers;

use App\Models\makananModel;
use App\Models\TransaksiModel;

class Restaurant extends BaseController
{
    public function index()
    {
        helper('number');
        $session = session();
        $name = $session->get();
        if ($session->get('user_role') == 'kasir') {
            $data = [
                'title' => 'Daftar Restaurant',
                'makanan' => $this->makananModel->getMakanan(),
                'name' => $name
            ];

            echo view('templates_admin/header');
            echo view('templates_admin/sidebarkasir', $data);
            echo view('admin/dashboard', $data);
            return view('restaurant/index', $data);
            echo view('templates_admin/footer');
        } else {
            echo "Wrong Page";
        }

    
        
    }
}
