<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Home | CRUD CI 4 APP'];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = ['title' => 'About Me | CRUD CI 4 APP'];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = ['title' => 'Contact | CRUD CI 4 APP'];
        return view('pages/contact', $data);
    }
}
