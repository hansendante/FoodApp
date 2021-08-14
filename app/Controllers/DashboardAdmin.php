<?php

namespace App\Controllers;

use App\Models\MakananModel;

class DashboardAdmin extends BaseController
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
        if ($session->get('user_role') == 'admin') {
            $data = [
                'title' => 'Daftar Makanan',
                'makanan' => $this->makananModel->getMakanan(),
                'name' => $session->get('user_name')
            ];
            echo view('templates_admin/header');
            echo view('templates_admin/sidebar', $data);
            echo view('admin/admindashboard', $data);
            echo view('templates_admin/footer');
        } else {
            echo "Wrong Page Admin";
        }
    }
    public function bar_chart()
    {

        $query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM users WHERE YEAR(created_at) = '" . date('Y') . "'
        GROUP BY YEAR(created_at),MONTH(created_at)");

        $record = $query->result();
        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->month_name;
            $data['data'][] = (int) $row->count;
        }
        $data['chart_data'] = json_encode($data);
        $this->load->view('bar_chart', $data);
    }
    public function admindashboard()
    {
        helper('number');
        $session = session();
        if ($session->get('user_role') == 'admin') {
            $data = [
                'title' => 'Daftar Makanan',
                'makanan' => $this->makananModel->getMakanan(),
                
            ];
            echo view('templates_admin/header');
            echo view('templates_admin/sidebar', $data);
            echo view('admin/admindashboard', $data);
            echo view('templates_admin/footer');
        } else {
            echo "Wrong Page Admin";
        }
    }
}
