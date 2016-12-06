<?php

class Catalogue extends Application
{

    private $_table = 'categories';
    public $_path = 'media/catalogue/';
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

}