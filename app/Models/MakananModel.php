<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table = "makanan";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama', 'slug', 'deskripsi', 'gambarmakanan', 'kuliner', 'jenismakanan', 'quantity', 'harga', 'created_at', 'updated_at', 'hargabahan', 'terjual', 'rating'];

    public function getMakanan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['slug' => $slug])->first();
    }
}
