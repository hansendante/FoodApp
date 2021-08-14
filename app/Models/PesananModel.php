<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class PesananModel extends Model{
 
    protected $table = "pesanan";
    protected $primaryKey = "id";
 
    protected $allowedFields = ['id', 'id_user', 'id_makanan', 'jumlah_order', 'created_at', 'updated_at', 'tempat', 'status', 'total_harga',];
    public function getProduct($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }
 
}