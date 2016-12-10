<?php

class Catalogue extends Application
{

    public $_path = 'media/catalogue/';
    public $_path_alt = 'media/unavailable/';
    public $_id;
    private $_table = 'categories';
    private $_table_1 = 'items';
    private $_table_2 = 'item_status';

    public function getCategories()
    {
        $sql = "SELECT * FROM `{$this->_table}`
                ORDER BY `name` ASC";
        return $this->db->fetchAll($sql);
    }

    public function getCategory($id)
    {
        if (!empty($id)) {
            $sql = "SELECT * FROM `{$this->_table}`
                WHERE `id`= '" . $this->db->escape($id) . "'";
            return $this->db->fetchOne($sql);
        }
    }

    public function getCategoryByName($name){

        if (!empty($name)) {
            $sql = "SELECT * FROM `{$this->_table}`
                WHERE `name`= '" . $this->db->escape($name) . "'";
            return $this->db->fetchOne($sql);
        }

    }

    public function getStatuses()
    {
        if (!empty($id)) {
            $sql = "SELECT * FROM `{$this->_table_2}`
                ORDER BY `status` ASC";
            return $this->db->fetchAll($sql);
        }
    }

    public function getStatus($id)
    {
        if (!empty($id)) {
            $sql = "SELECT * FROM `{$this->_table_2}`
                WHERE `id`= '" . $this->db->escape($id) . "'";
            return $this->db->fetchOne($sql);
        }
    }


    public function getItems($search = null, $library = null, $categories = null)
    {

        $sql = "SELECT * FROM `{$this->_table_1}`";

        $sql .= " WHERE true = true ";

        $sql .= !empty($library) ?
            " AND `library` = '" . $this->db->escape($library) . "'" : null;

        if (!empty($categories)) {
            $flag = true;
            foreach ($categories as $category) {
                $sql .= ($flag) ? " AND " : " OR ";
                $sql .= " `category` = '" . $this->db->escape($category) . "'";
                $flag = false;
            }
        }

        if (!empty($search)) {
            $sch = $this->db->escape($search);
            $sql .= " AND `title` LIKE '%{$sch}%' || `id` = '{$sch}'";
        }

        $sql .= " ORDER BY `title` ASC ";

        return $this->db->fetchAll($sql);

    }


    public function getItem($id = null)
    {

        if (!empty($id)) {
            $sql = "SELECT * FROM `{$this->_table_1}`
                WHERE `id`= '" . $this->db->escape($id) . "'";
            return $this->db->fetchOne($sql);
        }
    }
    
    
    public function is_item_available($id = null){
        if(!empty($id)){

            $item = $this->getItem($id);

            if(!empty($item)){
                if($item['available'] == 1){
                    return true;
                }
            }
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