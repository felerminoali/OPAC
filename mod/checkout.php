<?php
require_once('../inc/autoload.php');

if (isset($_POST['loan']) && isset($_POST['item'])) {

    $loan = $_POST['loan'];
    $item = $_POST['item'];
    $array = array();
    $array['check_in'] = 1;

    $objLoan = new Loan();

    if ($objLoan->updateLoan($array, $loan)) {


        // Get the reservation in-line
        $objReservation = new Reservation();
        $reservation = $objReservation->getResevationsByItem($item);

        // Get the first in-line
        $winner = array_shift($reservation);

        $array_reservation['readyForPickUp'] = 1;
        $reservation_id = $winner['id'];
        

        // Update reservation status
        if ($objReservation->updateReservation_Item($array_reservation, $item, $reservation_id)) {

            // send a notification email
            $objUser = new User();
            $user = $objUser->getUser($winner['user']);

            $objCatalog = new Catalogue();
            $item_details = $objCatalog->getItem($item);

            if (!empty($user) && !empty($item_details)) {

                // send email
                $objEmail = new Email();

                $process_result = $objEmail->process(2, array(
                    'email' => $user['email'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'item' => $item_details['title'],
                ));

            }


        }


    }


}


