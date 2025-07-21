<?php

namespace App\Controllers;
use CodeIgniter\Files\File;
use CodeIgniter\Files\FileCollection;


class Admin extends BaseController
{
    function __construct(){
            $this->db  = \Config\Database::connect();
            $this->session = session();
            $this->request = service('request');
    }

    private function checkUser (){
    if($this->session->get("logged_in")==false || $this->session->get("user")==""){
         return false;
   }else{
        return true;
   }
    
   }



    public function index(){

         if(!$this->checkUser()){
            return redirect()-> to("/admin/login");
         };

        $data["title"] = "Galvenā";

        return view('admin/main',$data);
    }
    public function users(){
        if(!$this->checkUser()){
            return redirect()-> to("/admin/login");
         };

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
        // if(!$this->checkUser()){
        //     return redirect()-> to("/admin/login");
        //  };


         $posts = [];
        $builder = $this->db->table('posts');
        $query = $builder->get();

          foreach ($query->getResult() as $row) {
               $posts[] = $row;
            }

         $data["posts"] = $posts;
         $data["title"] = "Raksti";
        return view('admin/posts',$data);
    }
    public function gallery(){
        // if(!$this->checkUser()){
        //     return redirect()-> to("/admin/login");
        //  };


        // 1. Forma kas ielādē failus (HTML+ Jquery)
        // 2. Funkcija kas apstrādā formu (upload files)
        // 3. Funkcija, kas nolasa failus no mapes, un atgriež JSON
        // 4. Ģenerēt failu sarakstu no JSON datiem parādīt tos HTML
        // 5. Failu dzēšana no mapes (papildus) 






         $data["title"] = "Galerija";
        return view('admin/gallery',$data);
    }

    public function file_upload(){
                // $data = $this->request->getPost();
                $error = false;

                $files = $this->request->getFiles('files[]');
                // return dd($files);  

                foreach($files["files"] as $file){ 
                    $fileName = $file->getClientName();
                        


                    if(! $file->move(FCPATH . 'uploads/', $fileName)){
                          $error[] = $file->getError();
                    };
            }

             if ($error == false) {
                    return $this->response->setJSON(["uploded"=>"ok"]); 
                }else{
                    return $this->response->setJSON(["uploded"=>"false","error"=>$error]); 
                }

    }

    public function list_files(){
                if(!$this->checkUser()){
                return NULL;
                 };


                $folder = FCPATH . 'uploads/';
                $collection = new FileCollection();
                $collection->add($folder);

                $files = [];

        foreach ($collection->get() as $filePath) {
            $file = new File($filePath);

            if ($file->isFile()) {
                $files[] = [
                    'name'     => $file->getBasename(),
                    'size'     => $file->getSizeByUnit('kb'),
                    'mime'     => $file->getMimeType(),
                    'url'      => base_url('uploads/' . $file->getBasename()),
                    'modified' => date('Y-m-d H:i:s', $file->getMTime()),
                ];
            }
        }

        return $this->response->setJSON($files);
    }



    public function login(){
         return view('admin/login');

    }
    public function authorize(){


        // janis.ozolins@example.com
        // Parole123

      $data =   $this->request->getPost();
      


       $user = "";
        $builder = $this->db->table('users');
        $query = $builder->like('email',esc($data["email"]))->get();
        $user = $query->getResultArray();
       

        if($user){
            if(password_verify($data["password"], $user[0]["password"])) {
                $this->session->set("user",$user[0]);
                $this->session->set("logged_in",true);
                return redirect()->to('/admin');
        }else{
            $this->session->set("user","");
            $this->session->set("logged_in",false);
            $this->session->setFlashdata("error","Lietotājvārds vai parole nav pareizs");
             return redirect()->to('/admin/login');
        }
    }else{
            $this->session->set("user","");
            $this->session->set("logged_in",false);
            $this->session->setFlashdata("error","Lietotājvārds vai parole nav pareizs");
            return redirect()->to('/admin/login');
    }
       




    //   1. Sameklēt lietotāju pēc lietotājvārda datubāzē
    //   2. Ja lietotājs ir, tad salīdzināt paroli
    //    3. ja lietotājs neeksistē, tad izvadīt kļūdas paziņojumu
    //     4. Ja lietotājs ir, bet parole nesakrīt, tad arī izvadīt paziņojumu
    // 5. Ja lietotājs ir un parole sakrīt, tad saglabāt lietotāju  sesijā  

    }
    public function logout(){

        $this->session->set("user","");
        $this->session->set("logged_in",false);
        return redirect()->to('/admin/login');
    }


   
}