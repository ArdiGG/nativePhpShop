<?php

function getProduct(int $id)
{
    $query = "SELECT * FROM products WHERE id = '{$id}'";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $product = $statement->fetch();

    return $product;
}

function getProducts($productsId)
{
    $strIds = implode( ', ', $productsId);

    $query = "SELECT *
                    FROM products
                    WHERE id in ({$strIds})";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $products = $statement->fetchAll();

    return $products;
}

function getLastProducts(int $limit = 16)
{
    $query = 'SELECT * FROM products ORDER BY id DESC LIMIT ' . $limit;

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $products = $statement->fetchAll();

    return $products;
}

function getProductsByCategoryId(int $categoryId)
{
    $query = "SELECT * FROM products WHERE category_id = '{$categoryId}'";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $products = $statement->fetchAll();

    return $products;
}