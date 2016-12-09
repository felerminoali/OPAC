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
    private $_table_1 = 'reservation';

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

    public function getBorrowByUser($id){

        if(!empty($id)){

            $sql = "SELECT 
                        `{$this->_table}`.id, 
                        `{$this->_table}`.reservation,
                        `{$this->_table}`.item,
                        `{$this->_table}`.loandate,
                        `{$this->_table}`.duedate,
                        `{$this->_table}`.renewal,
                        `{$this->_table}`.checked_in,
                        `{$this->_table_1}`.`user`
                        FROM
                        `{$this->_table}` ,
                        `{$this->_table_1}`
                        WHERE
                        `{$this->_table_1}`.reservation = `{$this->_table_1}`.id 
                        AND
                        `{$this->_table_1}`.`user` = '" . $this->db->escape($id) . "' 
                        AND
                        `{$this->_table_1}`.checked_in = 0";

            return $this->db->fetchAll($sql);
        }
    }



    function save_to_test_log($text)
    {
        $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
        fwrite($fp, $text);
        fclose($fp);
    }

}