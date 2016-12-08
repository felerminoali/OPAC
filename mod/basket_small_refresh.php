<?php
require_once("../inc/autoload.php");
$objBasket = new Basket();
$out = array();
$out['bl_ti'] = $objBasket->_number_of_items;
$out['bl_s'] = Helper::encodeHTML($objBasket->_summary);
echo json_encode($out);