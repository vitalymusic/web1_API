<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Page1",
            "content" => "This is page 1",
            "img" => "https://codeigniter.com/assets/icons/44521256.png"
        ];

        return $this->response->setJSON($data);
 
        //return view('welcome_message');
    }

     public function show_users()
     {
       $users = [
    [
        'name' => 'Jānis',
        'surname' => 'Ozoliņš',
        'email' => 'janis.ozolins@example.com',
        'password' => password_hash('Parole123', PASSWORD_DEFAULT),
        'address' => 'Brīvības iela 1, Rīga, LV-1010'
    ],
    [
        'name' => 'Laura',
        'surname' => 'Liepa',
        'email' => 'laura.liepa@example.com',
        'password' => password_hash('ManaParole!', PASSWORD_DEFAULT),
        'address' => 'Skolas iela 15, Jelgava, LV-3001'
    ],
    [
        'name' => 'Mārtiņš',
        'surname' => 'Bērziņš',
        'email' => 'martins.berzins@example.com',
        'password' => password_hash('CitsParole2024', PASSWORD_DEFAULT),
        'address' => 'Saulkrastu iela 23, Liepāja, LV-3401'
    ],
    [
        'name' => 'Elīna',
        'surname' => 'Kalniņa',
        'email' => 'elina.kalnina@example.com',
        'password' => password_hash('DrošaParole', PASSWORD_DEFAULT),
        'address' => 'Pils iela 8, Valmiera, LV-4201'
    ],
    [
        'name' => 'Andris',
        'surname' => 'Zariņš',
        'email' => 'andris.zarins@example.com',
        'password' => password_hash('Super123!', PASSWORD_DEFAULT),
        'address' => 'Dzirnavu iela 4, Daugavpils, LV-5401'
    ]
];


        return $this->response->setJSON($users);

     }

}
