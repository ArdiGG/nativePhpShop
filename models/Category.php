<?php

function getAllCategories()
{
    $query = 'SELECT * FROM categories';

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $categories = $statement->fetchAll();

    return $categories;
}