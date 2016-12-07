<?php

class Catalogue extends Application
{

    private $_table = 'categories';
    private $_table_1 = 'items';
    private $_table_2 = 'item_status';
    public $_path = 'media/catalogue/';
    public $_path_alt = 'media/unavailable/';
    public $_id;

    public function getCategories()
    {
        $sql = "SELECT * FROM `{$this->_table}`
                ORDER BY `name` ASC";
        return $this->db->fetchAll($sql);
    }

    public function getCategory($id)
    {
        $sql = "SELECT * FROM `{$this->_table}`
                WHERE `id`= '" . $this->db->escape($id) . "'";
        return $this->db->fetchOne($sql);
    }

    public function getStatuses()
    {
        $sql = "SELECT * FROM `{$this->_table_2}`
                ORDER BY `status` ASC";
        return $this->db->fetchAll($sql);
    }

    public function getStatus($id){
        $sql = "SELECT * FROM `{$this->_table_2}`
                WHERE `id`= '" . $this->db->escape($id) . "'";
        return $this->db->fetchOne($sql);
    }


    public function getItems($search = null, $library = null, $categories = null){

        $sql = "SELECT * FROM `{$this->_table_1}`";

        $sql .= " WHERE true = true ";

        $sql .= !empty($library) ?
            " AND `library` = '". $this->db->escape($library) . "'": null;

        if(!empty($categories)){
            $flag = true;
            foreach ($categories as $category){
                $sql .= ($flag) ? " AND " : " OR ";
                $sql .= " `category` = '". $this->db->escape($category) . "'";
                $flag = false;
            }
        }

        if(!empty($search)){
            $sch = $this->db->escape($search);
            $sql .= " AND `title` LIKE '%{$sch}%' || `id` = '{$sch}'";
        }

        $sql .= " ORDER BY `title` ASC ";
        
        $this->save_to_test_log($sql);
        
        return $this->db->fetchAll($sql);

    }

    function save_to_test_log($text)
    {
        $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
        fwrite($fp, $text);
        fclose($fp);
    }

}