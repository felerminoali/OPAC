<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/10/2016
 * Time: 12:26 PM
 */
class LoanBussinessRule
{
    
    public function renewLoan($array = null, $id = null){
        if(!empty($array) && ($id)) {
            
            $param['checked_in'] = 1;
            if($this->checkIn($param, $id)){
                if($this->checkOut($array, 1)){
                    return true;
                }    
            }
        }
        return false;
    }
    
    public function checkIn($array, $id){
        // check in 
        $objLoan = new Loan();
        return $objLoan->updateLoan($array, $id);
    }
    
    public function checkOut($array, $is_renewal = 0){

        if(!empty($array)){
        // Due according to catalog category
        $dueDate = new DateTime();

        $objCatalogue = new Catalogue();
        $item_details = $objCatalogue->getItem($array['item']);
        $cat = $objCatalogue->getCategory($item_details['category']);
        $loanPeriod = $cat['loanPeriod'];

        $dueDate->modify('+ ' . $loanPeriod . ' days');
        $array['duedate'] = $dueDate->format('Y-m-d-H:i:s');
        $array['renewal'] = $is_renewal;

        $objLoan = new Loan();
        return $objLoan->addLoan($array);

        }
    }

    public function is_renewable($item = null, $user = null){

        if(!empty($item) && !empty($user)){

            if(!$this->is_reserved($item) && !$this->is_maximum_loan($item, $user) && $this->is_available($item)){
                return true;
            }
        }


        return false;
    }

    public function is_reserved($id = null){

        if(!empty($id)){

            $objReservation = new Reservation();
            $reservation = $objReservation->getResevationsByItem($id);

            if(!empty($reservation)){
                return false;
            }
        }
        return true;
    }

    public function is_maximum_loan($item= null, $user=null){

        if(!empty($item) && !empty($user)){
            $objBusiness = new Business();
            $opac_config = $objBusiness->getBusiness();

            
        }

    }





}