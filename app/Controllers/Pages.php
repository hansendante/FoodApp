<?php

namespace App\Controllers;

class Pages extends BaseController
{

    public function index()
    {
        $session = session();
        echo "Welcome, " . $session->get('user_name');
        $data = [
            'title' => 'FodApp Website'

        ];
        return view('pages/index', $data);
    }
    public function home()
    {
        $session = session();
        echo "Welcome, " . $session->get('user_name');
        $data = [
            'title' => 'Home | FodApp Website',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }
}
