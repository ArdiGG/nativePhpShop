<?php

require "./../models/Category.php";
require "./../models/Product.php";

function index()
{
    $categories = getAllCategories();

}

function show(int $id)
{
    $category = getCategory($id);
}