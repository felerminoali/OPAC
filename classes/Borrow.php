<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 10:14 AM
 */
class Borrow extends Application
{

    private $_table = 'borrowed_items';

    public function getBorrow($id)
    {
        $sql = "SELECT * FROM `{$this->_table}`
                 WHERE 
                  `{$this->_table}`.`item` ='" . $this->db->escape($id) . "'
                 AND `checked_in` = 0";

        $result = $this->db->fetchOne($sql);

        if (!empty($result)) {
            return $result;
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