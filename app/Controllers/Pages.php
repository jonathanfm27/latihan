<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'HomePage'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. abc No. 123',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Jl bcd NO.345',
                    'kota' => 'Bandung'
                ]
            ]

        ];

        return view('pages/contact', $data);
    }
}
