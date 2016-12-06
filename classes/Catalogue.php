<?php

class Catalogue extends Application
{

    private $_table = 'categories';
    private $_table_1 = 'items';
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


    public function getItems($search = null){

        $sql = "SELECT * FROM `{$this->_table_1}`";
        $sql .= !empty($search) ?
            " WHERE `id` = '" . $this->db->escape($search) . "'" : null;
        $sql .= " ORDER BY `title` ASC";
        return $this->db->fetchAll($sql);

    }

}