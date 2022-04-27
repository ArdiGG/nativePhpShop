<?php

require "../models/Category.php";
require "../models/Product.php";

function index($smarty)
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $product = getProduct($id);
    $categories = getAllCategories();

    $smarty->assign('product', $product);
    $smarty->assign('categories', $categories);
    $smarty->assign('pageTitle', Title . $product['name']);

    $smarty->assign('itemInCart', 0);
    if(in_array($id, $_SESSION['cart'])){
        $smarty->assign('itemInCart', 1);
    }

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
