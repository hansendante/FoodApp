<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Hansen',
                'email'    => 'hansenreizo@gmail.com',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Abong',
                'email'    => 'sorareizo@gmail.com',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Sange',
                'email'    => '54170279@student.kwikkiangie.ac.id',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],

        ];

        // Simple Queries
        // $this->db->query("INSERT INTO orang (nama, email, created_at, updated_at) VALUES(:nama:, :email:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        // $this->db->table('orang')->insert($data);
        $this->db->table('orang')->insertBatch($data);
    }
}
