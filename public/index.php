<?php

require_once "../vendor/autoload.php";

use Frameworkphp3wa\Kernel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

session_start();
$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
$twig = new Environment($loader, [
    'cache' => false,
]);
$twig->addGlobal('session', $_SESSION);
$_SESSION["twig"] = $twig;

$kernel = new Kernel();
$kernel->run();
