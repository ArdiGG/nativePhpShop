<?php

function d($param, $die = 1)
{
    echo "Debug:<br/>";
    var_dump($param);
    if ($die) {
        die();
    }
}

function loadPage($smarty, $controller, $action)
{
    require PathPrefix . $controller . PathPostfix;

    $action($smarty);
}

function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}