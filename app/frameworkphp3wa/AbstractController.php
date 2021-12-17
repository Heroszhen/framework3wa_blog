<?php

namespace Frameworkphp3wa;

use App\Entity\Article;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController{
    private $templateEngine;

    public function __construct() {
        $loader = new FilesystemLoader(dirname(__DIR__, 2) . '/templates');
        $this->templateEngine = new Environment($loader, [
            'cache' => false,
        ]);
    }

    protected function render($file,$arguments=[]){
        $this->templateEngine->addGlobal('session', $_SESSION);
        echo $this->templateEngine->render($file, $arguments);
    }

    protected function Toredirect($url){
        header("Location: /".$url);
    }

    protected function json(array $response){
        echo json_encode($response);
    }
}