<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;

class SecurityController extends AbstractController{

    /**
     * route not found
     */
    public function index(){
        $_SESSION["page"] = "404";
        return $this->render("security.index.twig",[]);
    }
}