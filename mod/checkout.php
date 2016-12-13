<?php
require_once('../inc/autoload.php');

if (isset($_POST['reservation']) && isset($_POST['item']) && isset($_POST['user'])){

    $reservation = $_POST['reservation'];
    $item = $_POST['item'];
    $user_id = $_POST['user'];

    $array = array();
    $array['reservation'] = $reservation;
    $array['item'] = $item;
    $array['loandate'] = Helper::setDate();


    $objCatalogue = new Catalogue();
    $cat = $objCatalogue->getCategory($item);

    $objLBR = new ReservationBussinessRule();
    
    $array['duedate'] = $objLBR->get_pick_up_date($item, $cat['id'], $user_id, "Y-m-d-H:i:s");

    $objLoan = new Loan();

    if ($objLoan->addLoan($array)) {

        $array_reservation = array();
        $array_reservation['canceled'] = 1;

        save_to_test_log("reserve: ".$reservation);
        // Update reservation status
        if ($objReservation->updateReservation($array_reservation, $reservation)) {

            save_to_test_log("yeeeeeeeeeeeeeeeeeeeeeee");


//            // Get the reservation in-line
//            $objReservation = new Reservation();
//            $elegible = $objReservation->getResevationsByItem($item);
//
//            if (!empty($elegible)) {
//                // Get the first in-line
//                $winner = array_shift($elegible);
//
//                $reservation_item_array['readyForPickUp'] = 1;
//
//                if ($objReservation->updateReservation_Item($reservation_item_array, $item, $winner['id'])) {
//
//                    // send a notification email
//                    $objUser = new User();
//                    $user = $objUser->getUser($winner['user']);
//
//                    $item_details = $objCatalog->getItem($item);
//
//                    if (!empty($user) && !empty($item_details)) {
//
//                        // send email
//                        $objEmail = new Email();
//
//                        $process_result = $objEmail->process(2, array(
//                            'email' => $user['email'],
//                            'first_name' => $user['first_name'],
//                            'last_name' => $user['last_name'],
//                            'item' => $item_details['title'],
//                        ));
//
//                    }
//                }
//            }


        }


    }

}


function save_to_test_log($text)
{
    $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
    fwrite($fp, $text);
    fclose($fp);
}


