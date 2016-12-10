<?php
require_once ('../inc/autoload.php');

if(isset($_POST['loans'])){


//    $array = array();

    $loans = $_POST['loans'];

    $out = '';
    foreach ($loans as $loan) {
        $l = explode("_",$loan);

        $out .= 'id: '.$l[0];
        $out .= 'item: '.$l[1];
        $out .= 'reservation: '.$l[2];
    }




//    $array['item'] = $_POST['item'];
//    $array['reservation'] = $_POST['reservation'];
//    $array['loandate'] = Helper::setDate();
//
    
//    $objLoan = new Loan();
//    $objLoan->renewLoan($array,$loan);

//    $out = 'id: '.$l[0];
//    $out .= ' item: '.$array['item'];
//    $out .= ' reservation: '.$array['reservation'];
//    $out .= ' loandate: '.$array['loandate'];
    
    save_to_test_log($out);

}


function save_to_test_log($text)
{
    $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
    fwrite($fp, $text);
    fclose($fp);
}