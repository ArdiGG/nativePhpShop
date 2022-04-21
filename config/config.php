<?php

define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

$template = 'default';

define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

define('TemplateWebPath', "/templates/{$template}");

$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_с');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../tmp/smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);