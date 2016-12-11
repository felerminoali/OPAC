<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/11/2016
 * Time: 4:52 PM
 */

require_once ('../inc/autoload.php');

if(isset($_POST['reservation'])){
    
    $array = array();
    $reservation = $_POST['reservation'];
    $array['canceled'] = 1;
    
    $objReservation = new Reservation();
    $objReservation->updateReservation($array, $reservation);
    
}