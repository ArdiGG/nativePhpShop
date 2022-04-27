<?php

require_once "../models/Category.php";
require_once "../models/Product.php";

function index($smarty){
    $categories = getAllCategories();
    $products = getLastProducts(9);

    $smarty->assign('categories', $categories);
    $smarty->assign('pageTitle', Title . 'Главная странница');
    $smarty->assign('products', $products);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
