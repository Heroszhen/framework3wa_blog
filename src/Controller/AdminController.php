<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;
use Frameworkphp3wa\FlashBag;
use App\Entity\Category;
use App\Repository\CategoryRepository;

class AdminController extends AbstractController{

    public function index(){
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1)$this->Toredirect("");
        $_SESSION["page"] = "admin";
        $_SESSION["menu"] = "category";

        $cr = new CategoryRepository();
        $allcategory = $cr->findAll()->fetchAll();
        return $this->render("admin/index.html.twig",[
            "allcategory" => $allcategory
        ]);
    }

    public function addCategory(){
        //$postdata = file_get_contents("php://input");
        $response = [
            "status" => 0,
            "message" => ""
        ];
        $name = (isset($_POST["category_name"]))?$_POST["category_name"]:"";
        if($name != ""){
            $response["status"] = 1;
            $cr = new CategoryRepository();
            $one = $cr->add($name);
            return $this->render("admin/onecategory.html.twig",[
                "one" => $one
            ]);
        }
        $this->json($response);
    }

    public function getCategory($id){
        $response = [
            "status" => 0,
            "message" => ""
        ];
        $this->json($response);
    }
}