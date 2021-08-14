<?php

namespace App\Controllers;

class PagesKasir extends BaseController
{

    public function index()
    {
        $session = session();
        echo "Welcome, " . $session->get('user_name');
        $data = [
            'title' => 'FodApp Website'

        ];
        return view('pageskasir/index', $data);
    }
    public function home()
    {
        $session = session();
        echo "Welcome, " . $session->get('user_name');
        $data = [
            'title' => 'Home | FodApp Website',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pageskasir/home', $data);
    }
}
