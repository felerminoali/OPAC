<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/11/2016
 * Time: 2:42 AM
 */

require_once('../inc/autoload.php');

if(isset($_POST['reservation']) && $_POST['comment']){


    $array = array();
    $array['reservation'] = $_POST['reservation'];
    $array['comment'] = $_POST['comment'];
    $array['date_posted'] = Helper::setDate();
    
    $objReservation = new Reservation();
    $objReservation->addFeedBackComments($array);
    
}