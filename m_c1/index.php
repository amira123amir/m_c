<?php
require_once  __DIR__ . '/app/controller/ratingController.php';
require_once  __DIR__ . '/config/config.php';
require_once  __DIR__ . '/vendor/lib/MysqliDb.php';
require_once  __DIR__ . '/app/controller/userController.php';
require_once __DIR__ .'/app/controller/adminController.php';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name'],
);
//  echo $_SERVER['REQUEST_URI'];

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/m_c/');

$controller = new userController($db);
$rating     = new ratingController($db);
$admin     = new adminController($db);

switch ($request) {
    case BASE_PATH:
        $controller->showAllUser();
        break;

    case BASE_PATH . 'add':
        $controller->addUser();
        break;

    case BASE_PATH . 'show?id='.$_GET['id']:
        $controller->showUser($_GET['id']);
        break;

        case BASE_PATH . 'delete?id=' . $_GET['id']:
            $controller->deleteUser($_GET['id']);
            break;
        case BASE_PATH .'addrating':
        $rating->addrating();
        break;

        case BASE_PATH .'showRate':
            $rating->showRate();
            break;

   
       case BASE_PATH .'avg?id'. $_GET['id']:
                $rating->avgRating($_GET['id']);
             break;
         case BASE_PATH .'addAdmin':
                $admin->addAdmin();
             break;
    }
    ?>