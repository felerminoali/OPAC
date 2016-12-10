<?php
require_once ('../inc/autoload.php');

if(isset($_POST['loans'])){

    $loans_param_array = $_POST['loans'];
    
    $loans = array();
    
    // split the array 
    foreach ($loans_param_array as $loan_element) {
        $l = explode("_",$loan_element);
        $loans[] = $l; 
        $l = null;
    }

    $array = array();
    foreach ($loans as $loan){

        $id = $loan[0];
        $array['item'] = $loan[1];
        $array['reservation'] = $loan[2];
        $array['loandate'] = Helper::setDate();


        $objLoan = new LoanBussinessRule();
        $objLoan->renewLoan($array,$id);
        
    }
    

}
