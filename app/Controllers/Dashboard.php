<?php

namespace App\Controllers;

use App\Models\MakananModel;


class Dashboard extends BaseController
{
    
    protected $makananModel;
    public function __construct()
    {
        helper('form');
        helper('number');
        $this->makananModel = new MakananModel();
    }
    public function index()
    {
        
        $session = session();
        $name = $session->get();
        if ($session->get('user_role') == 'user') {
            $data = [
                'title' => 'Daftar Makanan',
                'makanan' => $this->makananModel->getMakanan(),
                'cart' => \Config\Services::cart(),
                'name' => $name
            ];
            echo view('templates/header');
            echo view('templates/sidebar', $data);
            echo view('dashboard');
            echo view('dashboard/index', $data);
            echo view('templates/footer');
        } else {
            echo "Wrong Page User";
        }
    }
    //crud shopping cart
    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }
    //insert cart
    public function add()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      =>  $this->request->getPost('id'),
            'qty'     => 1,
            'price'   =>  $this->request->getPost('price'),
            'name'    =>  $this->request->getPost('name'),
            'options' => array(
                'rating' => $this->request->getPost('rating'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $this->request->getPost('gambar'))
         ));
         session()->setflashdata('pesan', 'Makanan Berhasil Masuk Keranjang !');
         return redirect()->to(base_url('dashboard'));
    }
    //clear cart
    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        session()->setflashdata('pesan', 'Semua Isi Keranjang Berhasil Dihapus !');
         return redirect()->to(base_url('dashboard/'));
    }
    public function search()
    {
        
    }
    public function cart()
    {
        $session = session();
        $name = $session->get();
        if ($session->get('user_role') == 'user') {
            $data = [
                'title' => 'Daftar Makanan',
                'makanan' => $this->makananModel->getMakanan(),
                'cart' => \Config\Services::cart(),
                'name' => $name
            ];
            echo view('templates/header');
            echo view('templates/sidebar', $data);
            echo view('dashboard/cart', $data);
            echo view('templates/footer');
        } else {
            echo "Wrong Page User";
        }
        
    }
    public function update()
    {
        $cart = \Config\Services::cart();
        $i = 1;
        foreach($cart->contents() as $key => $value) {
            $cart->update(array(
                'rowid' => $value['rowid'],
                'qty' => $this->request->getPost('qty' . $i++),
             ));
        }
        session()->setflashdata('pesan', 'Data Keranjang Berhasil Diupdate !');
         return redirect()->to(base_url('dashboard/cart'));
        
    }
    public function delete($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        session()->setflashdata('pesan', 'Data Keranjang Berhasil Diupdate !');
         return redirect()->to(base_url('dashboard/cart'));
    }
    public function order()
    {
        $cart = \Config\Services::cart();
        echo "Order Diterima";
    }
}
