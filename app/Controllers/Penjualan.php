<?php

namespace App\Controllers;

use App\Models\makananModel;
use App\Models\TransaksiModel;

class Penjualan extends BaseController
{
    protected $makananModel;
    protected $transaksiModel;
    public function __construct()
    {
        $this->makananModel = new MakananModel();
        $this->transaksiModel = new TransaksiModel();
        helper('number');
    }


    public function index()
    {
        $session = session();
        if ($session->get('user_role') == 'admin') {
            $data = [
                'title' => 'Daftar Penjualan',
                'makanan' => $this->makananModel->getMakanan(),
                'transaksi' => $this->transaksiModel->getMakanan()
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
            echo view('templates_admin/sidebar');
            echo view('admin/dashboard', $data);
            return view('penjualan/index', $data);
            echo view('templates_admin/footer');
        } else {
            echo "Wrong Page";
            //$makanan = $this->makananModel->findAll();
            /*$session = session();
        echo "Welcome, " . $session->get('user_name');*/
        }
        
        
    }


    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} makanan harus diisi.',
                ]
            ],

        ])) {
            return redirect()->to('/transaksi/form')->withInput();
        }


        
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->transaksiModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'quantity' => $this->request->getVar('quantity'),
            'totalharga' => $this->request->getVar('harga') * $this->request->getVar('quantity'),
            'kodetransaksi' => $this->request->getVar('kodetransaksi')



        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditransaksi');

        return redirect()->to('/transaksi');
    }
    public function form()
    {
        $data = [
            'title' => 'Form Transaksi Barang',
            'validation' => \Config\Services::validation()
        ];

        return view('transaksi/form', $data);
    }
    public function delete($id)
    {
        $this->transaksiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/transaksi');
    }
    public function getDataByTanggal()
    {
        $allTanggal = $this->db->query("CALL GetDataByTanggal()")->getResult();

        echo "<pre>";

        print_r($allTanggal);
    }
}
