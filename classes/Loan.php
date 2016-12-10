<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 10:14 AM
 */
class Loan extends Application
{

    private $_table = 'loans';
    private $_table_1 = 'reservation';

    public function getLoan($id)
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

    public function getLoanByUser($id){

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
                        `{$this->_table}`.reservation = `{$this->_table_1}`.id 
                        AND
                        `{$this->_table_1}`.`user` = '" . $this->db->escape($id) . "' 
                        AND
                        `{$this->_table}`.checked_in = 0";

            return $this->db->fetchAll($sql);
        }
    }

    public function updateLoan($array = null, $id = null)
    {
        if (!empty($array) && !empty($id)) {
            $this->db->prepareUpdate($array);
            if ($this->db->update($this->_table, $id)) {
                return true;
            }
            return false;
        }
    }
    
    public function addLoan($params){

        if (!empty($params)) {
            
            $this->db->prepareInsert($params);
            return $this->db->insert($this->_table);
            
        }
    }

    public function getQtdRenewalsByUser($item = null, $user=null){

        if(!empty($item) && !empty($user)){

            $sql = "SELECT 
                        `{$this->_table_1}`.`user`, `{$this->_table}`.item, COUNT(`{$this->_table}`.id) AS `qty`
                    FROM 
                        `{$this->_table}`, `{$this->_table_1}`
                    WHERE
                        `{$this->_table_1}`.`id` = `{$this->_table}`.`reservation`
                    AND `{$this->_table_1}`.`user` ='" . $this->db->escape($user) . "'
                    AND `{$this->_table}`.`item` ='" . $this->db->escape($item) . "'
                    AND `renewal` = 1";

            return $this->db->fetchOne($sql);

        }
    }


    function save_to_test_log($text)
    {
        $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
        fwrite($fp, $text);
        fclose($fp);
    }

}