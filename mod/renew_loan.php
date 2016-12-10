<?php
require_once ('../inc/autoload.php');

if(isset($_POST['loan'])&& isset($_POST['item']) && isset($_POST['reservation'])){


    $array = array();

    $loan = $_POST['loan'];
    $array['item'] = $_POST['item'];
    $array['reservation'] = $_POST['reservation'];
    $array['loandate'] = Helper::setDate();
    
    
    $objLoan = new Loan();
    $objLoan->renewLoan($array,$loan);

}