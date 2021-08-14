<?php

namespace App\Controllers;

use App\Models\MakananModel;
class DashboardKasir extends BaseController
{
    protected $makananModel;
    public function __construct()
    {
        $this->makananModel = new MakananModel();
    }
    public function index()
    {
        helper('number');
        $session = session();
        $name = $session->get();
        if($session->get('user_role') == 'kasir'){
            echo "Welcome, " . $session->get('user_name');
            echo " Role : " . $session->get('user_role');
            $data = [
                'title' => 'Daftar Makanan',
                'makanan' => $this->makananModel->getMakanan(),
                'name' => $name
            ];
            echo view('templates_admin/header');
            echo view('templates_admin/sidebarkasir', $data);
            echo view('kasir/dashboard', $data);
            echo view('templates_admin/footer');
        }
        else{
            echo "Wrong Page Kasir";
        }
        
    }
}
