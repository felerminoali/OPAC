<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/10/2016
 * Time: 12:26 PM
 */
class Loan
{
    
    public function renewLoan($array = null, $id = null){
        if(!empty($array) && ($id)) {
            
            $param['checked_in'] = 1;
            if($this->checkIn($param, $id)){
                if($this->checkOut($array)){
                    return true;
                }    
            }
        }
        return false;
    }
    
    public function checkIn($array, $id){
        // check in 
        $objLoan = new Borrow();
        return $objLoan->updateLoan($array, $id);
    }
    
    public function checkOut($array){

        // Due according to catalog category
        $dueDate = new DateTime();

        $objCatalogue = new Catalogue();
        $item_details = $objCatalogue->getItem($array['item']);
        $cat = $objCatalogue->getCategory($item_details['category']);
        $loanPeriod = $cat['loanPeriod'];

        $dueDate->modify('+ ' . $loanPeriod . ' days');
        $array['duedate'] = $dueDate->format('Y-m-d-H:i:s');

        $objLoan = new Borrow();
        return $objLoan->addLoan($array);
    }



}