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
            $this->checkIn($param, $id);
            
            $this->checkOut($array);
        }
    }
    
    public function checkIn($array, $id){

        // check in 
        $objLoan = new Borrow();
        $objLoan->updateLoan($array, $id);
    }
    
    public function checkOut($array, $id){

        // Due according to catalog category
        $dueDate = new DateTime(Helper::setDate());

        $objCatalogue = new Catalogue();
        $item_details = $objCatalogue->getItem($array['item']);
        $cat = $objCatalogue->getCategory($item_details['category']);
        $loanPeriod = $cat['loanPeriod'];

        $dueDate->modify('+ ' . $loanPeriod . ' days');
        $array['duedate'] = $dueDate;

        $objLoan = new Borrow();
        $objLoan->addLoan($array);
        
        
        
    }

}