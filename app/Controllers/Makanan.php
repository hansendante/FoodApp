<?php

namespace App\Controllers;

use App\Models\MakananDescModel;
use App\Models\MakananModel;

class Makanan extends BaseController
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
        if ($session->get('user_role') == 'admin') {
            $data = [
                'title' => 'Daftar Makanan',
                'makanan' => $this->makananDescModel->getMakanan()
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
            return view('makanan/index', $data);
            echo view('templates_admin/footer');
        } else {
            echo "Wrong Page";
            //$makanan = $this->makananModel->findAll();
            /*$session = session();
        echo "Welcome, " . $session->get('user_name');*/
        }
    }

    public function detail($slug)
    {
        $session = session();
        if ($session->get('user_role') == 'admin') {
            echo "Welcome, " . $session->get('user_name');
            echo " Role : " . $session->get('user_role');
            $data = [
                'title' => 'Detail Makanan',
                'makanan' => $this->makananModel->getMakanan($slug)

            ];

            // jika makanan tidak ada di tabel
            if (empty($data['makanan'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Makanan  ' . $slug . ' tidak ditemukan.');
            }
            echo view('templates_admin/header');
            echo view('templates_admin/sidebar');
            return view('makanan/detail', $data);
            echo view('templates_admin/footer');
        } else {
            echo "Wrong Page";
        }
    }

    public function save()
    {
        $session = session();
        if ($session->get('user_role') == 'admin') {
            //validasi input
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|is_unique[makanan.nama]',
                    'errors' => [
                        'required' => '{field} makanan harus diisi.',
                        'is_unique' => '{field} makanan sudah terdaftar.'
                    ]
                ],
                'gambarmakanan' => [
                    'rules' => 'max_size[gambarmakanan,2048]|is_image[gambarmakanan]|mime_in[gambarmakanan,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]

            ])) {
                //$validation = \Config\Services::validation();
                // return redirect()->to('/makanan/create')->withInput()->with('validation', $validation);
                return redirect()->to('/makanan')->withInput();
            }

            //ambil makanan

            $fileMakanan = $this->request->getFile('gambarmakanan');
            // apakah tidak ada gambar diupload
            if ($fileMakanan->getError() == 4) {
                $namaGambar = 'default.jpg';
            } else {
                //generate nama gambar random
                $namaGambar = $fileMakanan->getRandomName();
                // pindahkan file ke folder img
                $fileMakanan->move('img', $namaGambar);
            }


            $slug = url_title($this->request->getVar('nama'), '-', true);
            $this->makananModel->save([
                'nama' => $this->request->getVar('nama'),
                'slug' => $slug,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'kuliner' => $this->request->getVar('kuliner'),
                'gambarmakanan' => $namaGambar,
                'jenismakanan' => $this->request->getVar('jenismakanan'),
                'quantity' => $this->request->getVar('quantity'),
                'harga' => $this->request->getVar('harga'),
                'hargabahan' => $this->request->getVar('hargabahan')

            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

            return redirect()->to('/makanan');
        } else {
            echo "Wrong Page";
        }
    }

    public function delete($id)
    {
        $session = session();
        if ($session->get('user_role') == 'admin') {
            //cari gambar berdasarkan id
            $makanan = $this->makananModel->find($id);

            //cek jika gambar file default.jpg
            if ($makanan['gambarmakanan'] != 'default.jpg') {
                // hapus gambar
                unlink('img/' . $makanan['gambarmakanan']);
            }


            $this->makananModel->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/makanan');
        } else {
            echo "Wrong Page";
        }
    }

    public function edit($slug)
    {
        $session = session();
        if($session->get('user_role') == 'admin'){
            $data = [
                'title' => 'Form Ubah Data Makanan',
                'validation' => \Config\Services::validation(),
                'makanan' => $this->makananModel->getMakanan($slug)
            ];
            echo view('templates_admin/header');
            echo view('templates_admin/sidebar');
            return view('makanan/edit', $data);
            echo view('templates_admin/footer');
        }else{
            echo "Wrong Page";
        }
        
    }

    public function update($id)
    {
        $session = session();
        if($session->get('user_role') == 'admin'){
            $makananLama = $this->makananModel->getMakanan($this->request->getVar('slug'));
            if ($makananLama['nama'] == $this->request->getVar('nama')) {
                $rule_nama = 'required';
            } else {
                $rule_nama = 'required|is_unique[makanan.nama]';
            }
    
            if (!$this->validate([
                'nama' => [
                    'rules' => $rule_nama,
                    'errors' => [
                        'required' => '{field} makanan harus diisi.',
                        'is_unique' => '{field} makanan sudah terdaftar.'
                    ]
                ],
                'gambarmakanan' => [
                    'rules' => 'max_size[gambarmakanan,2048]|is_image[gambarmakanan]|mime_in[gambarmakanan,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]    
            ])) {
                return redirect()->to('/makanan/edit/' . $this->request->getVar('slug'))->withInput();
            }
    
            $fileMakanan = $this->request->getFile('gambarmakanan');
    
            //cek gambar, apakah gambar tetap gambar lama atau tidak
            if ($fileMakanan->getError() == 4) {
                $namaGambar = $this->request->getVar('gambarmakananLama');
            } else {
                // generate nama file random
                $namaGambar = $fileMakanan->getRandomName();
                // pindahkan gambar
                $fileMakanan->move('img', $namaGambar);
                // hapus file lama
                unlink('img/' . $this->request->getVar('gambarmakananLama'));
            }
    
            $slug = url_title($this->request->getVar('nama'), '-', true);
            $this->makananModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'slug' => $slug,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'kuliner' => $this->request->getVar('kuliner'),
                'gambarmakanan' => $namaGambar,
                'jenismakanan' => $this->request->getVar('jenismakanan'),
                'harga' => $this->request->getVar('harga'),
                'hargabahan' => $this->request->getVar('hargabahan')
    
            ]);
    
    
            session()->setFlashdata('pesan', 'Data berhasil diubah');
    
            return redirect()->to('/makanan');
        }else{
            echo "Wrong Page";
        }
        // cek nama
      
    }
}
