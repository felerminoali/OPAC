<?php
class Login {

	public static $_login_page_front = "/?page=login";
	public static $_dashboard_front = "/?page=catalogue";
	public static $_login_front = "cid";

    // Library Management system
    public static $_login_page_lms = "/library/";
    public static $_dashboard_lms = "/library/?page=checkout";
    public static $_login_lms = "aid";

	
	public static $_valid_login = "valid";
	public static $_referrer = "refer";


	public static function isLogged($case = null) {
		if (!empty($case)) {
			if (
				isset($_SESSION[self::$_valid_login]) && 
				$_SESSION[self::$_valid_login] == 1
			) {
				return isset($_SESSION[$case]) ? true : false;
			}
			return false;
		}
		return false;
	}
	
	public static function loginFront($id = null, $url = null) {
		if (!empty($id)) {
			$url = !empty($url) ? $url : self::$_dashboard_front;
			$_SESSION[self::$_login_front] = $id;
			$_SESSION[self::$_valid_login] = 1;
			Helper::redirect($url);
		}
	}


	public static function restrictFront() {
		if (!self::isLogged(self::$_login_front)) {
			$url = Url::cPage() != "logout" ?
					self::$_login_page_front."&".self::$_referrer."=".Url::cPage() :
					self::$_login_page_front;
			Helper::redirect($url);
		}
	}

	public static function string2hash($string = null) {
		if (!empty($string)) {
			return hash('sha512', $string);
		}
	}

	public static function logout($case = null) {
		if (!empty($case)) {
			$_SESSION[$case] = null;
			$_SESSION[self::$_valid_login] = null;
			unset($_SESSION[$case]);
			unset($_SESSION[self::$_valid_login]);
		} else {
			session_destroy();
		}
	}

	public static function getFullNameFront($id = null) {
		if (!empty($id)) {
			$objUser = new User();
			$user = $objUser->getUser($id);
			if (!empty($user)) {
				return $user['first_name']." ".$user['last_name'];
			}
		}
	}

    
    // LMS

    public static function loginLMS($id = null, $url = null){
        if(!empty($id)){
            $url = !empty(!$url) ? $url : self::$_dashboard_lms;
            $_SESSION[self::$_login_lms] = $id;
            $_SESSION[self::$_valid_login] = 1;
            Helper::redirect($url);
        }
    }

    public static function restrictLMS() {
        if (!self::isLogged(self::$_login_lms)) {
            Helper::redirect(self::$_login_page_lms);
        }
    }

    public static function getFullNameLMS($id = null) {
        if (!empty($id)) {
            $objLMS = new LMS();
            $user = $objLMS->getUser($id);
            if (!empty($user)) {
                return $user['first_name']." ".$user['last_name'];
            }
        }
    }

}