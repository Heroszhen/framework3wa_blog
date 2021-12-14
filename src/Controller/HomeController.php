<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;
use Frameworkphp3wa\FlashBag;
use App\Entity\User;
use App\Repository\UserRepository;

class HomeController extends AbstractController{

    public function index(){
        $_SESSION["page"] = "home";
        $user = new User();
        $flash = new FlashBag();
        $flash->empty();

        $post = $_POST;
        if($post != null){
            $email = (isset($post["login_email"]))?$post["login_email"]:"";
            $password = (isset($post["login_password"]))?$post["login_password"]:"";/*
            if($email != "" && $password != ""){
                $ur = new UserRepository();
                $result = $ur->findUserByEmail($email);
                $result = $result->fetchAll();
                if(count($result) > 0){
                    $found = $result[0];
                    if (password_verify($password, $found["password"])){
                        $found["password"] = "";
                        $_SESSION["user"] = $found;
                        //redirection
                        $_SESSION["page"] = "admin_category";
                        $this->Toredirect("admin");
                    }
                }
                $flash->set("L'email ou le mot de passe incorrect","danger");
            }else{
                $flash->set("Veuillez remplir tous les champs","danger");
            }
            $user->setEmail($email);*/
            $_SESSION["page"] = "admin_category";
            $this->Toredirect("admin");
        }
        return $this->render("home/index.html.twig",[
            "user" => $user,
            "flash" => $flash->get()
        ]);
    }
}