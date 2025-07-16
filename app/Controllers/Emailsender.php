<?php

namespace App\Controllers;

class Emailsender extends BaseController
{



    public function index(){

            return view('email_form');

    }


    public function send(){
            $request = service('request');
            $email = service('email');
            $config['protocol'] = 'smtp';
            $config['charset']  = 'UTF-8';
            $config['wordWrap'] = true;
            $config['SMTPCrypto'] = 'tls';
            $config['SMTPPort'] = 587;
            $config['SMTPUser'] = '';
            $config['SMTPPass'] = '';
            $config['SMTPHost'] = 'smtp.gmail.com';

            $email->initialize($config);


            $email->setFrom('vitalijs.korabelnikovs@gmail.com', $request->getPost('name'));
            $email->setTo($request->getPost('email'));

            $email->setSubject('Email Test');
            $email->setMessage($request->getPost('message'));

            if($email->send()){
                return view('email_success');
            }   

    }
}