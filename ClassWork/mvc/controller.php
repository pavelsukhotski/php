<?php

$request['model'] = isset($_GET['model'])?$_GET['model']:'guestbook';
$request['command'] = isset($_GET['command'])?$_GET['command']:'read';
$request['page'] = isset($_GET['page'])?intval($_GET['page']):1;
$request['id'] = isset($_GET['id'])?intval($_GET['id']):0;

require $request['model'] . '.php';

$data = runmodel($request);
ob_start();
require $request['model'] . 'view.php';
ob_end_flush();