<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/6/2016
 * Time: 4:19 PM
 */

class Library extends Application{

    private $_table = 'library';

    public function getlibraries(){
        $sql = "SELECT * FROM `{$this->_table}`
                ORDER BY `name` ASC";
        return $this->db->fetchAll($sql);
    }


    public function getlibrary($id = null){
        
        if(!empty($id)){
            $sql = "SELECT * FROM `{$this->_table}`
                    WHERE `id` = '".$this->db->escape($id)."'";

            return $this->db->fetchOne($sql);
            
        }
       
    }

}