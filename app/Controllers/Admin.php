<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function index(){

        $data["title"] = "Galvenā";

        return view('admin/main',$data);
    }
    public function users(){
         $data["title"] = "Lietotāji";

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