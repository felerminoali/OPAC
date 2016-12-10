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

//    $out = '';
    $array = array();
    foreach ($loans as $loan){

//        $out .= ' | id: '.$loan[0];
//        $out .= ' item: '.$loan[1];
//        $out .= ' reservation: '.$loan[2];

        $id = $loan[0];
        $array['item'] = $loan[1];
        $array['reservation'] = $loan[2];
        $array['loandate'] = Helper::setDate();


        $objLoan = new Loan();
        $objLoan->renewLoan($array,$id);
        
    }
    
//    $out = 'id: '.$l[0];
//    $out .= ' item: '.$array['item'];
//    $out .= ' reservation: '.$array['reservation'];
//    $out .= ' loandate: '.$array['loandate'];
    
//    save_to_test_log($out);

}


function save_to_test_log($text)
{
    $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
    fwrite($fp, $text);
    fclose($fp);
}