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
    private $_table_3 = "users";

    public function getResevationsByItem($item = null, $user = null)
    {

        if (!empty($item)) {

            $sql = "SELECT * FROM `{$this->_table}`, `{$this->_table_1}`, `{$this->_table_3}`  
                 WHERE 
                  `{$this->_table}`.`id` = `{$this->_table_1}`.`reservation`
                 AND `{$this->_table}`.`user` = `{$this->_table_3}`.`id`
                 AND `{$this->_table_1}`.`item` ='" . $this->db->escape($item) . "'
                 AND `{$this->_table}`.`canceled` = 0";

            $sql .= ($user) ? " AND `{$this->_table_3}`.id <> '" . $this->db->escape($user) . "'" : null;
            $sql .= ' ORDER BY `dateRevesed` ASC ';

            return $this->db->fetchAll($sql);
        }
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

                $comment_array['reservation'] = $reservation_id;
                $comment_array['comment'] = $comment;


                if (!$this->addFeedBackComments($comment_array)) {
                    return false;
                }

                foreach ($items_array as $item) {


                    $reservation_item['reservation'] = $reservation_id;
                    $reservation_item['item'] = $item['id'];


                    // Status
                    $objCatalogue = new Catalogue();
                    $cat = $objCatalogue->getCategory($item['category']);

                    $objRBR = new ReservationBussinessRule();

                    $user = Session::getSession(Login::$_login_front);
                    $pick_up_date = $objRBR->get_pick_up_date($item['id'], $cat['loanPeriod'], $user);

                    $today = new DateTime();

                    if ($pick_up_date == $today->format('d/m/Y')) {
                        $reservation_item['readyForPickUp'] = 1;
                    }

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

    public function addFeedBackComments($params)
    {

        if (!empty($params)) {

            $this->db->prepareInsert($params);

            return $this->db->insert($this->_table_2);
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

    public
    function getCommentsByReservation($reservation = null)
    {

        if (!empty($reservation)) {

            if (!empty($reservation)) {
                $sql = "SELECT * FROM `{$this->_table_2}`
                WHERE `reservation`= '" . $this->db->escape($reservation) . "'
                ORDER BY `date_posted` ASC";

                return $this->db->fetchAll($sql);
            }

        }

    }

    public function updateReserve($array = null, $id = null)
    {
        if (!empty($array) && !empty($id)) {
            $this->db->prepareUpdate($array);
            if ($this->db->update($this->_table, $id)) {
                return true;
            }
            return false;
        }
        
    }

    function save_to_test_log($text)
    {
        $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
        fwrite($fp, $text);
        fclose($fp);
    }

    public function updateReservation_Item($array, $item, $reservation)
    {
        if (!empty($array) && !empty($item) && !empty($reservation)) {

            $this->db->prepareUpdate($array);

            $sql = "UPDATE `{$this->_table_1}` SET ";
            $sql .= implode(", ", $this->db->_update_sets);
            $sql .= " WHERE 
                        `{$this->_table_1}`.item = '" . $this->db->escape($item) . "'
                        AND `{$this->_table_1}`.reservation = '" . $this->db->escape($reservation) . "'";

            return $this->db->query($sql);
        }

    }

    public function getReadyReservations($user = null){

        if(!empty($user)){

            $sql = "
                SELECT
                    `{$this->_table_1}`.reservation,
                    `{$this->_table_1}`.item,
                    `{$this->_table_3}`.id AS `user`
                    
                    
                    FROM
                    `{$this->_table_1}` ,
                    `{$this->_table_3}` ,
                    `{$this->_table}`
                    
                    
                    WHERE
                    `{$this->_table_1}`.reservation = `{$this->_table}`.id
                    AND `{$this->_table_3}`.id = `{$this->_table}`.`user`
                    AND `{$this->_table_3}`.card_id = '" . $this->db->escape($user) . "'
                    AND `{$this->_table}`.canceled = 0
                    AND `{$this->_table_1}`.readyForPickUp = 1";
            
            return $this->db->fetchAll($sql);

        }

        
    }

   

}