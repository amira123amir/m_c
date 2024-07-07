<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';
require_once __DIR__ . '/app/controllers/timesController.php';
require_once __DIR__ . '/app/controllers/statesController.php';
//use app\controllers\UserController;

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$request = $_SERVER['REQUEST_URI'];
 
define('BASE_PATH', '/m_c/');

$controller1 = new timesController($db);
$controller2 = new statesController($db);
switch ($request) {
   
        case BASE_PATH . 'showd':
            $controller1->showd(); //عرض الدكاترا واختصاصاتهم
            break;
          
          case BASE_PATH . "checkdatehour":
          $controller1->checkdatehour(); //معرفة الساعات المتاحة في اليوم المراد حجز مواعيد فيه    
          break;    
          case BASE_PATH . 'showinfoabouttime':
            $controller2->showinfoabouttime(); //عرض معلومات عن الموعد متل اسم الدكتور واسم المريض واليوم والساعة
            break;
            case BASE_PATH . "addstates?id_t=".$_GET['id_t']:
                $controller2->addstates($_GET['id_t']);//اضافة حالة مرضية
                break;
                case BASE_PATH . "addt?id_d=".$_GET['id_d']."&id_u=".$_GET['id_u']:
                    $controller1->addt($_GET['id_d'],$_GET['id_u']);//اضافة موعد للمريض
                    break;
          default:
           break;   
}
?>