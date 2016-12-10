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
    private $_table_2 = 'feedback_comments';

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

    public function getItemByReservation($id = null)
    {

        if (!empty($id)) {

            $sql = "SELECT * FROM `{$this->_table_1}`
                WHERE `reservation` = '" . $this->db->escape($id) . "'";

            return $this->db->fetchAll($sql);
        }

    }

    public function placeRevervation($params = null, $items_array = null, $comment = null)
    {

        if (!empty($params) && !empty($items_array)) {

            if ($this->addReservation($params)) {

                $reservation_id = $this->db->lastId();

                $comment_array['reservation'] =  $reservation_id;
                $comment_array['comment'] =  $comment;
                

                if(!$this->addFeedBackComments($comment_array)){
                    return false;
                }

                foreach ($items_array as $item) {

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

    public function addReservation_items($params)
    {

        if (!empty($params)) {

            $this->db->prepareInsert($params);

            return $this->db->insert($this->_table_1);
        }

    }


    public function getUserReservations($id = null)
    {

        if (!empty($id)) {
            $sql = "SELECT * FROM `{$this->_table}`
                      WHERE `user` = '" . $this->db->escape($id) . "'
                       AND `canceled` = 0
                      ORDER BY `dateRevesed` DESC";

            return $this->db->fetchAll($sql);
        }

    }

    public function getReservationsByUserAndItem($user = null, $item = null)
    {

        if (!empty($user) && !empty($item)) {

            $sql = "SELECT * FROM `{$this->_table}`, `{$this->_table_1}`
                      WHERE 
                      `{$this->_table}`.id = `{$this->_table_1}`.reservation
                      AND `{$this->_table_1}`.item = '" . $this->db->escape($item) . "' 
                      AND `user` = '" . $this->db->escape($user) . "'
                      AND `canceled` = 0";

            return $this->db->fetchAll($sql);
        }

    }

    public function getReservation($id = null)
    {

        if (!empty($id)) {
            $sql = "SELECT * FROM `{$this->_table}`
                WHERE `id`= '" . $this->db->escape($id) . "'";
            return $this->db->fetchOne($sql);
        }
    }

    public function addFeedBackComments($params)
    {

        if (!empty($params)) {

            $this->db->prepareInsert($params);

            return $this->db->insert($this->_table_2);
        }
    }


    public function getCommentsByReservation($reservation = null){

        if(!empty($reservation)){

            if (!empty($reservation)) {
                $sql = "SELECT * FROM `{$this->_table_2}`
                WHERE `reservation`= '" . $this->db->escape($reservation) . "'
                ORDER BY `date_posted` ASC";

                return $this->db->fetchAll($sql);
            }

        }

    }
}