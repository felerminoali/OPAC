<?php

class User extends Application
{

    public $_id;
    private $_table = "users";

    public function isUser($card_id, $password)
    {
        $pass = Login::string2hash($password);
        $sql = "SELECT * FROM `{$this->_table}`
                 WHERE `card_id` ='" . $this->db->escape($card_id) . "'
                 AND `password` ='" . $this->db->escape($pass) . "'
                 AND `active` = 1";

        $result = $this->db->fetchOne($sql);
        if (!empty($result)) {
            $this->_id = $result['id'];
            return true;
        }
        return false;
    }

    public function addUser($params = null, $pw = null)
    {

        if (!empty($params)) {


            $this->db->prepareInsert($params);

            if ($this->db->insert($this->_table)) {
                
                $password =  $this->randomPassword();
                $gen_params['password'] = Login::string2hash($password);
                $gen_params['card_id'] = 'OPAC' . strtoupper($params['last_name']) . '' . $this->db->lastId();

                if ($this->updateUser($gen_params, $this->db->lastId())) {

                    // send email
                    $objEmail = new Email();

                    $process_result = $objEmail->process(1, array(
                        'email' => $params['email'],
                        'first_name' => $params['first_name'],
                        'last_name' => $params['last_name'],
                        'password' => $password,
                        'card_id' => $gen_params['card_id'],
                        'hash' => $params['hash']
                    ));

                    return $process_result;
                }

            }
            return false;
        }
        return false;
    }

    function randomPassword($length = 6)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function updateUser($array = null, $id = null)
    {
        if (!empty($array) && !empty($id)) {
            $this->db->prepareUpdate($array);
            if ($this->db->update($this->_table, $id)) {
                return true;
            }
            return false;
        }
    }

    public function getUserByHash($hash = null)
    {
        if (!empty($hash)) {
            $sql = "SELECT * FROM `{$this->_table}`
                    WHERE `hash` = '";
            $sql .= $this->db->escape($hash) . "'";

            return $this->db->fetchOne($sql);
        }
    }

    public function makeActive($id = null)
    {
        if (!empty($id)) {
            $sql = "UPDATE `{$this->_table}`
		     SET `active` = 1
		     WHERE `id` = '" . $this->db->escape($id) . "'";
            return $this->db->query($sql);
        }
    }

    public function getByEmail($email = null)
    {
        if (!empty($email)) {
            $sql = "SELECT `id` FROM `{$this->_table}`
		     WHERE `email` = '" . $this->db->escape($email) . "'
		     AND `active` = 1";
            return $this->db->fetchOne($sql);
        }
    }

    public function getUser($id = null)
    {
        if (!empty($id)) {
            $sql = "SELECT * FROM `{$this->_table}`
                    WHERE `id` = '" . $this->db->escape($id) . "'";
            return $this->db->fetchOne($sql);
        }
    }

    public function getUsers($search = null)
    {
        $sql = "SELECT * FROM `{$this->_table}`
                    WHERE `active` = 1";
        $sql .= !empty($search) ?
            " AND (`first_name` LIKE '%" . $this->db->escape($search) . "%' 
                || `last_name` LIKE '%" . $this->db->escape($search) . "%'" : null;
        $sql .= " ORDER BY `last_name`, 'first_name' ASC";
        return $this->db->fetchAll($sql);
    }

    public function removeUser($id = null)
    {
        if (!empty($id)) {
            $sql = "DELETE FROM `{$this->_table}`
                      WHERE `id` = '" . $this->db->escape($id) . "'";
            return $this->db->query($sql);
        }
    }

    function save_to_test_log($text)
    {
        $fp = fopen(ROOT_PATH . DS . "log" . DS . "error.log", 'a');
        fwrite($fp, $text);
        fclose($fp);
    }
}
