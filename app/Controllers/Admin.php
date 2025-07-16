<?php

namespace App\Controllers;

class Admin extends BaseController
{
    function __construct(){
            $this->db  = \Config\Database::connect();
    }




    public function index(){

        $data["title"] = "Galvenā";

        return view('admin/main',$data);
    }
    public function users(){

        $users = [];
        $builder = $this->db->table('users');
        $query = $builder->get();

          foreach ($query->getResult() as $row) {
               $users[] = $row;
            }

         $data["title"] = "Lietotāji";
         $data["users"] = $users;

        return view('admin/users',$data);

    }
    public function posts(){
         $data["title"] = "Raksti";
        return view('admin/posts',$data);
    }
    public function gallery(){
         $data["title"] = "Galerija";
        return view('admin/gallery',$data);
    }
    public function logout(){

        // 
    }
    

}