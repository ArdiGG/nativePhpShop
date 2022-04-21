<?php

require_once "../models/Category.php";

function index($smarty){
    $categories = getAllCategories();

    $smarty->assign('categories', $categories);
    $smarty->assign('pageTitle', 'ArdiShop | Главная странница');

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
