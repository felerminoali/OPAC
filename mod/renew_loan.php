<?php
require_once ('../inc/autoload.php');

if(isset($_POST['loan'])&& isset($_POST['item']) && isset($_POST['reservation'])){


    $array = array();

    $loan = $_POST['loan'];
    $array['item'] = $_POST['item'];
    $array['reservation'] = $_POST['reservation'];
    $array['loandate'] = Helper::setDate();
    
    
    $objLoan = new Loan();
//    $objLoan->renewLoan($array,$loan);

    $out = 'id: '.$loan;
    $out .= ' item: '.$array['item'];
    $out .= ' reservation: '.$array['reservation'];
    $out .= ' loandate: '.$array['loandate'];
    
    save_to_test_log($out);

}


function save_to_test_log($text)
{
    $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
    fwrite($fp, $text);
    fclose($fp);
}