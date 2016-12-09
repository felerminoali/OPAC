<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 12:24 PM
 */
class Reservation extends Application
{

    private $_table = 'reservation';
    private $_table_1 = 'reservation_items';

    public function getResevationsByItem($id){

        $sql = "SELECT * FROM `{$this->_table}`, `{$this->_table_1}` 
                 WHERE 
                  `{$this->_table}`.`id` = `{$this->_table_1}`.`reservation`
                 AND `{$this->_table_1}`.`item` ='" . $this->db->escape($id) . "'
                 AND `{$this->_table}`.`canceled` = 0";

        $sql .= ' ORDER BY `dateRevesed` ASC ';

        return $this->db->fetchAll($sql);
    }
    
    public function placeRevervation(){
        return true;
    }
}