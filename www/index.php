<?php

require_once "../vendor/autoload.php";

require_once '../library/mainFunctions.php';
require_once "../config/config.php";
require_once '../config/db.php';

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
$action = isset($_GET['action']) ? ucfirst($_GET['action']) : 'index';

loadPage($smarty, $controller, $action);