<?php

require "../models/Category.php";
require "../models/Product.php";

function index($smarty)
{
    $categories = getAllCategories();
    $productsId = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = getProducts($productsId);

    $smarty->assign('categories', $categories);
    $smarty->assign('products', $products);
    $smarty->assign('pageTitle', Title . 'Cart');

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

function addtocart()
{
    $productId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$productId) {
        exit();
    }

    $data = array();

    if (isset($_SESSION['cart']) && array_search($productId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $productId;
        $data['cntItems'] = count($_SESSION['cart']);
        $data['success'] = 1;
    } else {
        $data['success'] = 0;
    }

    echo json_encode($data);
}

function deletefromcart()
{
    $productId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (is_null($productId)) {
        exit();
    }

    $data[] = array();
    $key = array_search($productId, $_SESSION['cart']);

    if ($key !== false) {
        unset($_SESSION['cart'][$key]);

        $data['cntItems'] = count($_SESSION['cart']);
        $data['success'] = 1;
    } else {
        $data['success'] = 0;
    }

    echo json_encode($data);
}