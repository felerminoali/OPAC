<?php

require_once ('../inc/autoload.php');

if(isset($_POST['job'])&& isset($_POST['id'])){
    
    $out = array();
    
    $job = $_POST['job'];
    $id = $_POST['id'];
    
    
    $objCatalogue = new Catalogue();
    
    $item = $objCatalogue->getItem($id);
    
    if(!empty($item)){
        
        switch ($job){
            case 0:
                Session::removeItem($id);
                $out['job'] = 1;
                break;
            case 1:
                Session::setItem($id, $item['category']);
                $out['job'] = 0;
                break;
        }
        echo json_encode($out);
    }
    
    
    
    
}