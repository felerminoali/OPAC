<?php

class Business extends Application {

    private $_table = 'config';

    public function getBusiness() {
        $sql = "SELECT * FROM `{$this->_table}`
                WHERE `id` = 2";
        return $this->db->fetchOne($sql);
    }
    
    public function updateBusiness($array =null)
    {
        if(!empty($array)){
            $this->db->prepareUpdate($array);
            return $this->db->update($this->_table,1);
        }
    }
}
