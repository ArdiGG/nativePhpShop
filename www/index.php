<?php
session_start();

require_once "../vendor/autoload.php";

require_once '../library/mainFunctions.php';
require_once "../config/config.php";
require_once '../config/db.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controller, $action);