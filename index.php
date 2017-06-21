<?php
require __DIR__ . '/autoload.php';

$contr = isset($_GET['contr']) ? $_GET['contr'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $contr . 'Controller';
$controller = new $controllerClassName;
$method = 'action' . $act;
$controller->$method();
