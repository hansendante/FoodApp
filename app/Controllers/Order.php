<?php

namespace App\Controllers;

use App\Models\MakananDescModel;
use App\Models\MakananModel;

class Order extends BaseController
{
    protected $makananModel;
    public function __construct()
    {
        $this->makananModel = new MakananModel();
        $this->makananDescModel = new MakananDescModel();
        helper('number');
    }


    public function index()
    {
        $session = session();
        $name = $session->get();
        if ($session->get('user_role') == 'kasir') {
            $data = [
                'title' => 'Daftar Makanan',
                'makanan' => $this->makananDescModel->getMakanan(),
                'name' => $name

            ];

            // cara konek db tanpa model
            // $db = \Config\Database::connect();
            // $makanan = $db->query("SELECT * FROM makanan");
            // foreach ($makanan->getResultArray() as $row) {
            //     d($row);
            // }

            //$makananModel = new \App\Models\makananModel();
            //$makananModel = new makananModel();
            echo view('templates_admin/header');
            echo view('templates_admin/sidebarkasir', $data);
            echo view('admin/dashboard', $data);
            return view('order/index', $data);
            echo view('templates_admin/footer');
        } else {
            echo "Wrong Page";
            //$makanan = $this->makananModel->findAll();
            /*$session = session();
        echo "Welcome, " . $session->get('user_name');*/
        }
    }
}