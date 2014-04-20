<?php
require_once('../vendor/autoload.php');


$smarty = new Smarty();

$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');
$smarty->setConfigDir('../configs/');
$smarty->setCacheDir('../cache/');

$smarty->assign('name','Juan');

//** un-comment the following line to show the debug console
$smarty->debugging = true;

$smarty->display('test.tpl');

// echo SMARTY_DIR;
?>
