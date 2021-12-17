<?php

namespace App\Repository;

use App\Entity\Category;
use Frameworkphp3wa\AbstractRepository;

class CategoryRepository extends AbstractRepository{

    public function findAll(){
        $req = "SELECT * FROM category";
        return $this->execRequete($req);
    }   
    
    public function add($name){
        return $this->persist("category",["name"=>$name]);
    }
}
