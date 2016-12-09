<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/9/2016
 * Time: 12:24 PM
 */
class Reservation extends Application
{

    private $_table = 'reservation';
    private $_table_1 = 'reservation_items';

    public function getResevationsByItem($id)
    {

        $sql = "SELECT * FROM `{$this->_table}`, `{$this->_table_1}` 
                 WHERE 
                  `{$this->_table}`.`id` = `{$this->_table_1}`.`reservation`
                 AND `{$this->_table_1}`.`item` ='" . $this->db->escape($id) . "'
                 AND `{$this->_table}`.`canceled` = 0";

        $sql .= ' ORDER BY `dateRevesed` ASC ';

        return $this->db->fetchAll($sql);
    }

    public function placeRevervation($params = null, $array = null)
    {

        if (!empty($params) && !empty($array)) {

            if ($this->addReservation($params)) {

                $reservation_id = $this->db->lastId();
                
                foreach ($array as $item) {

                    $reservation_item['reservation'] = $reservation_id;
                    $reservation_item['item'] = $item['id'];
                    
                    if (!$this->addReservation_items($reservation_item)) {
                      return false;
                    }
                }
                
                return true;

            }
        }

    }

    public function addReservation($params)
    {

        if (!empty($params)) {

            $this->db->prepareInsert($params);

            return $this->db->insert($this->_table);
        }

    }

    public function addReservation_items($reservation_item)
    {

        if (!empty($reservation_item)) {

            $this->db->prepareInsert($reservation_item);

            return $this->db->insert($this->_table_1);
        }

    }
}