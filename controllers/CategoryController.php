<?php

require "./../models/Category.php";
require "./../models/Product.php";

function index($smarty)
{
    $categoryId = isset($_GET['id']) ? $_GET['id'] : null;

    if(is_null($categoryId)) exit();

    $categories = getAllCategories();

    $category = getCategory($categoryId);
    $products = null;
    $childCategories = null;

    if($category['parent_id'] == 0){
        $childCategories = getChildrenCategory($categoryId);
    } else {
        $products = getProductsByCategoryId($categoryId);
    }
    $smarty->assign('pageTitle', 'ArdiShop | ' . $category['name']);
    $smarty->assign('childCategories', $childCategories);
    $smarty->assign('products', $products);
    $smarty->assign('category', $category);
    $smarty->assign('categories', $categories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}