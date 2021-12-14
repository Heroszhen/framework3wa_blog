<?php

namespace App\Repository;

use App\Entity\Exemple;
use Frameworkphp3wa\AbstractRepository;

class UserRepository extends AbstractRepository{

    public function findUserByEmail($email){
        $req = "SELECT * FROM user where email = :email";
        return $this->execRequete($req,["email" => $email]);
    }
}
