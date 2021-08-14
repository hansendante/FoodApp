<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = ['cart', 'quantity', 'totalharga', 'kodetransaksi', 'harga', 'nama', 'slug', 'id', 'promo', 'promoharga'];

    public function getMakanan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['slug' => $slug])->first();
    }
    public function getTanggal($tanggalAwal, $tanggalAkhir)
    {
        $a_procedure = "CALL GetDataByTanggal ($tanggalAwal, $tanggalAkhir)";
        return $this->db->query( $a_procedure, array());
    }
}
