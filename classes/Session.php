<?php

class Session{
    
    public static function setItem($id, $cat){
        $_SESSION['basket'][$id]['cat']= $cat;
    }
    
    public static function removeItem($id, $cat = null){
            $_SESSION['basket'][$id] = null;
            unset($_SESSION['basket'][$id]);
    }
    
    public static function getSession($name = null){
        if(!empty($name)){
            return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
        }
    }
    
    public static function setSession($name = null, $value = null){
        if(!empty($name) && !empty($value)){
            $_SESSION[$name] = $value;
        }
    }

    public static function clear($id = null){

        if(!empty($id) && isset( $_SESSION[$id])){
            $_SESSION[$id] = null;
            unset($_SESSION[$id]);
        }else{
            session_destroy();
        }
    }
}