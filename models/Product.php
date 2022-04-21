<?php

function getLastProducts(int $limit = 16){
    $query = 'SELECT * FROM products ORDER BY id DESC LIMIT ' . $limit;

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $products = $statement->fetchAll();

    return $products;
}

function getProductsByCategoryId(int $categoryId){
    $query = "SELECT * FROM products WHERE category_id = '{$categoryId}'";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $products = $statement->fetchAll();

    return $products;
}