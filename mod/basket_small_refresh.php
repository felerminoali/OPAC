<?php
require_once("../inc/autoload.php");
$objBasket = new Basket();
$out = array();
$out['bl_ti'] = $objBasket->_number_of_items;
$out['bl_s'] = '<p>'.$objBasket->_summary.'</p>';
echo json_encode($out);