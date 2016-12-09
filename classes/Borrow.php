<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 10:14 AM
 */
class Borrow
{

    private $_table = 'borrowed_items';

    public function isBorrowed($id)
    {

        $sql = "SELECT * FROM `{$this->_table}`
                 WHERE 
                  `{$this->_table}`.`item` ='" . $this->db->escape($id) . "'
                 AND `checked_in` = 0";


        $this->save_to_test_log($sql);
        
        $result = $this->db->fetchOne($sql);

        if (!empty($result)) {
            $this->_id = $result['id'];
            return true;
        }

        return false;
    }

    public function getBorrow($id)
    {

        if ($this->isBorrowed($id)) {

            $sql = "SELECT * FROM `{$this->_table}`
                 WHERE 
                  `{$this->_table}`.`item` ='" . $this->db->escape($id) . "'
                 AND `checked_in` = 0";

            return $this->db->fetchOne($sql);

        }
        return false;
        
    }

    function save_to_test_log($text)
    {
        $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
        fwrite($fp, $text);
        fclose($fp);
    }

}