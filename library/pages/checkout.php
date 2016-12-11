<?php

Login::restrictLMS();

$action = Url::getParam('action');

switch ($action){
    case 'about':
        require_once ('checkout/about.php');
        break;
    
    default:
        require_once('checkout/list.php');
}