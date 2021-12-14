<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;
use Frameworkphp3wa\FlashBag;

class ExempleHomeController extends AbstractController{

    public function index($id){
        $flash = new FlashBag();
        $flash->empty();
        $flash->set("exemple flashbag message : id-> ".$id,"info");
        return $this->render("exemplehome.index.twig",[
            "flash" => $flash->get()
        ]);
    }
}
