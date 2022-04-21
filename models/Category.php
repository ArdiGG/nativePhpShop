<?php

function getCategory(int $id){
    $query = "SELECT * FROM categories WHERE id = '{$id}'";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $category = $statement->fetch();

    return $category;
}

function getAllCategories()
{
    $query = 'SELECT * FROM categories WHERE parent_id = 0';

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $categories = $statement->fetchAll();

    $data = [];

    foreach ($categories as $category){
        $childrenCategories = getChildrenCategory($category['id']);
        if(isset($childrenCategories)){
            $category['childrens'] = $childrenCategories;
        }

        $data[] = $category;
    }

    return $data;
}

function getChildrenCategory(int $parent_id){
    $query = "SELECT * FROM categories WHERE parent_id = '{$parent_id}'";

    $statement = $GLOBALS['pdo']->prepare($query);
    $statement->execute();

    $childrenCategories = $statement->fetchAll();

    return $childrenCategories;
}