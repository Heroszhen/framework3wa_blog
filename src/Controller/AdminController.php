<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;
use Frameworkphp3wa\FlashBag;


class AdminController extends AbstractController{

    public function index(){
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1)$this->Toredirect("");
        $_SESSION["page"] = "admin";
        $_SESSION["menu"] = "category";
        return $this->render("admin/index.html.twig",[
            
        ]);
    }
}