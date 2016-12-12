<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/12/2016
 * Time: 5:06 PM
 */
class ReservationBussinessRule
{

    public function get_total_waiting_day($item, $cat){


        $objReservation = new Reservation();
        $total_waiting_day = 0;
        $queue_list = $objReservation->getResevationsByItem($item);


        if (!empty($queue_list)) {
            $no_of_waiting_days = $cat;
            $total_waiting_day = $no_of_waiting_days * count($queue_list);
        }

        

        return $total_waiting_day;
        

    }

    public function get_pick_up_date($item, $cat){

        $objBorrow = new Loan();
        $borrow = $objBorrow->getLoan($item);

        if (!empty($borrow)) {
            // Due date if this catalogue was borrowed
            $start_date = new DateTime($borrow['duedate']);
        } else {
            // Current date if this catalogue was not borrowed
            $start_date = new DateTime();
        }
        $total_waiting_day = $this->get_total_waiting_day($item, $cat);
        
        if ($total_waiting_day!= 0) {
            $start_date->modify('+ ' . $total_waiting_day . ' days');
        }

        return $start_date->format('d/m/Y');

    }


  

}